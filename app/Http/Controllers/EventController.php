<?php

namespace App\Http\Controllers;


use App\Category_event;
use App\Category_ticket;
use \stdClass;
// use App\E_organizer;
use Auth;
use App\Event;
use App\Ticket;
use App\Transaction;
use App\Detail_transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
  	// $myevents = Event::leftJoin('category_events', 'events.ctgE_id', '=', 'category_events.id')
   //                          ->select('events.*', 'category_events.name_category AS Category_Event')
   //                          ->where('eo_id', $eo->id)
   //                          ->paginate(10);
  	$events = \DB::table('events')
                    ->rightJoin('tickets', 'tickets.event_id', '=', 'events.id')
                    // ->select('events.*', 'tickets.price as price')
                    ->selectRaw('events.*, MIN(tickets.price) AS price')
                    // ->min('tickets.price')
                    ->where('events.status', '!=', 'wait')
                    ->where('events.status', '!=', 'rejected')
                    ->whereNull('events.deleted_at')
                    ->groupBy('events.id')
                    ->orderBy('events.id', 'desc')->get();
    // dd($events);
    return view('home', compact('events'));
  }

  public function show(Event $event)
  {
    $tickets = \DB::table('tickets')
                      ->leftJoin('category_tickets', 'tickets.ctgT_id', '=', 'category_tickets.id')
                      ->select('tickets.*', 'category_tickets.name_category AS Category_Ticket')
                      ->where('event_id', $event->id)
                      ->whereNull('tickets.deleted_at')
                      ->get();
    // $tickets = Ticket::all()->where('event_id', $event->id);
    // dd($tickets);

    return view('detailevent', compact('event', 'tickets'));
  }

  public function checkout(Request $request, Event $event)
  {
    $sub_total_order = 0;
    $data_request = $request->all();

    foreach ($data_request as $key => $value) {
      $price = \DB::table('tickets')->where('id', $value['id'])->first();

      if( $price->quantity <= 0 || (($price->quantity - $value['qty']) <= 0) ){
        return response()->json(['errors' => $price->ticket_name.' Tickets are Sold Out.'], 422);
      }

      if($price->deleted_at != null || ($price->status == "waiting" || $price->status == "disable" || $price->status == "rejected") ){
        return response()->json(['errors' => 'Invalid!. '.$price->ticket_name.' ticket status are ' .$price->status. '!'], 422);
      }

      $sub_total_order += $value['qty'] * $price->price;
    }

    $transaction = Transaction::create([
            'email_user' => Auth::user()->email,
            'sub_total_order' => $sub_total_order,
            'order_time' => date("Y-m-d H:i:s"),
            'total_payment' => 0,
            'status' => 'pending',
            'user_id' => Auth::user()->id
    ]);

    foreach ($data_request as $key => $value) {
      $price = \DB::table('tickets')->where('id', $value['id'])->first();
      Detail_transaction::create([
            'transaction_id' => $transaction->id,
            'ticket_id' => $value['id'],
            'price' => $price->price,
            'quantity' => $value['qty']
      ]);
    }

    return response()->json(['id' => $transaction->id], 200);
  }

  public function history()
  {
    // return view('detailticket', compact('transactions', 'new_event_id'));
    return view('mytransaction');
  }

  public function ticket()
  {
    
    $transactions = \DB::table('transactions')
                        ->leftJoin('detail_transactions', 'transactions.id', '=', 'detail_transactions.transaction_id')
                        ->join('tickets', 'tickets.id', '=', 'detail_transactions.ticket_id')
                        ->join('events', 'events.id', '=', 'tickets.event_id')
                        ->leftJoin('category_tickets', 'tickets.ctgT_id', '=', 'category_tickets.id')
                        ->selectRaw('transactions.*, detail_transactions.*, events.*, tickets.ticket_name, tickets.price AS ticket_price, tickets.start_sale, tickets.end_sale, tickets.start_time, tickets.end_time, tickets.ticket_photo, tickets.status AS ticket_status, tickets.event_id, category_tickets.name_category AS category_ticket')
                        ->orderBy('transactions.id', 'desc')
                        ->orderBy('detail_transactions.id', 'desc')
                        ->where('transactions.user_id', Auth::user()->id)
                        ->whereNull('tickets.deleted_at')
                        ->get();

    $event_id= array();
    $new_event_id = array();
    foreach ($transactions as $key => $value) {
        array_push($event_id, $value->event_id);
    }

    $result = array_unique(array_filter($event_id));

    foreach ($result as $key => $value) {
      array_push($new_event_id, $value);
    }

    // dd($transactions);
    return view('detailticket', compact('transactions', 'new_event_id'));
  }

  // public function detailTicketEvent(Event $event)
  // {
  //   $tickets = Ticket::all()->where('event_id', $event->id);
  //   dd($tickets);
  // }
}
