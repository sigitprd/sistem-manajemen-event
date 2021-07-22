<?php

namespace App\Http\Controllers;

use Auth;
use App\Ticket;
use App\Event;
use App\E_organizer;
use App\Category_ticket;
use App\Transaction;
use App\Detail_transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eo = \DB::table('e_organizers')->select('*')->where('user_id', Auth::user()->id)->first();

        $myevents = \DB::table('events')->select('*')->orderBy('event_name', 'ASC')
                        ->where('eo_id', $eo->id)
                        ->whereNull('deleted_at')
                        ->get();

        $category_tickets = \DB::table('category_tickets')->select('*')
                                ->orderBy('name_category', 'ASC')
                                ->get();

        $tickets = \DB::table('tickets')
                        ->leftJoin('events', 'tickets.event_id', '=', 'events.id')
                        ->join('category_tickets', 'tickets.ctgT_id', '=', 'category_tickets.id')
                        ->select('tickets.*', 'events.event_name', 'events.eo_id', 'category_tickets.name_category AS Category_Ticket')
                        ->orderBy('ticket_name', 'ASC')
                        ->orderBy('category_tickets.name_category', 'ASC')
                        ->where('eo_id', $eo->id)
                        ->whereNull('tickets.deleted_at')
                        ->get();

        $transactions = \DB::table('transactions')
                            ->rightJoin('detail_transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                            ->select('transactions.*', 'detail_transactions.*')
                            ->where('transactions.status', 'completed')
                            ->whereIn('detail_transactions.ticket_id', $tickets->pluck('id')->toArray())
                            ->get();
        // dd(($transactions->sum('quantity') / ( count($tickets->where('status', 'available')) + $transactions->sum('quantity'))) );

        return view('EO.ticket', compact('category_tickets', 'myevents', 'tickets', 'transactions'));
    }

    public function all()
    {
        $eo = \DB::table('e_organizers')->select('*')->where('user_id', Auth::user()->id)->first();

        $tickets = \DB::table('tickets')
                        ->leftJoin('events', 'tickets.event_id', '=', 'events.id')
                        ->join('category_tickets', 'tickets.ctgT_id', '=', 'category_tickets.id')
                        ->select('tickets.*', 'events.event_name', 'events.eo_id', 'category_tickets.name_category AS Category_Ticket')
                        ->orderBy('ticket_name', 'ASC')
                        ->orderBy('Category_Ticket', 'ASC')
                        ->where('eo_id', $eo->id)
                        ->whereNull('tickets.deleted_at')
                        ->get();

        $transactions = \DB::table('transactions')
                            ->rightJoin('detail_transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                            ->select('transactions.*', 'detail_transactions.*')
                            ->where('transactions.status', 'completed')
                            ->whereIn('detail_transactions.ticket_id', $tickets->pluck('id')->toArray())
                            ->get();

                        // {{ (int)($transactions->sum('quantity') / ($tickets->where('status', 'available')->sum('quantity') + $transactions->sum('quantity')) * 100) }}

        $data_sold_out = (int)($transactions->sum('quantity') / ($tickets->where('status', 'available')->sum('quantity') + $transactions->sum('quantity')) * 100);

        $data_total = count($tickets);
        $data_available = count($tickets->where('status', 'available'));
        return response()->json(['tickets' => $tickets, 'data_total' => $data_total, 'data_available' => $data_available, 'data_sold_out' => $data_sold_out], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ctgT_id' => 'required',
            'event_id' => 'required',
            'ticket_name' => 'required|string|max:255',
            'start_sale' => 'required|date',
            'end_sale' => 'required|date|after_or_equal:start_sale',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after_or_equal:start_time',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|string|max:255',
            'ticket_photo' => 'required|image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:50000',
        ]);

        if ($validator->passes()) {

            $event = Event::where('id', $request->event_id)->first();
            // dd($event);
            
            if($event->status == "waiting"){
                $request->request->add(['status' => "waiting"]);
            }else if($event->status == "rejected"){
                $request->request->add(['status' => "rejected"]);
            }else{
                $request->request->add(['status' => "available"]);
            }
            // dd($request->all());
            if ($request->hasFile('ticket_photo')) 
            {
                $ticket = $request->file('ticket_photo');
                $new_ticket = Str::random(40) . '.' . $ticket->getClientOriginalExtension();
                $ticket->move(public_path("assets3/ticket_photo"), $new_ticket);
            }


            $ticket = Ticket::create([
                            'ticket_name' => $request->ticket_name,
                            'ctgT_id' => $request->ctgT_id,
                            'description' => $request->description,
                            'price' => $request->price,
                            'start_sale' => $request->start_sale,
                            'end_sale' => $request->end_sale,
                            'start_time' => $request->start_time,
                            'end_time' => $request->end_time,
                            'ticket_photo' => $new_ticket,
                            'quantity' => $request->quantity,
                            'status' => $request->status,
                            'event_id' => $request->event_id,
                        ]);
            
            return response()->json(['success' => "true"], 200);
        } else {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function detail(Event $event)
    {
        $tickets = \DB::table('tickets')
                        ->leftJoin('category_tickets', 'tickets.ctgT_id', '=', 'category_tickets.id')
                        ->select('tickets.*', 'category_tickets.name_category AS Category_Ticket')
                        ->orderBy('Category_Ticket', 'ASC')
                        ->where('event_id', $event->id)
                        ->whereNull('tickets.deleted_at')
                        ->get();

        $transactions = \DB::table('transactions')
                            ->rightJoin('detail_transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                            ->select('transactions.*', 'detail_transactions.*')
                            ->where('transactions.status', 'completed')
                            ->whereIn('detail_transactions.ticket_id', $tickets->pluck('id')->toArray())
                            ->get();

                        // {{ (int)($transactions->sum('quantity') / ($tickets->where('status', 'available')->sum('quantity') + $transactions->sum('quantity')) * 100) }}

        $data_sold_out = (int)($transactions->sum('quantity') / ($tickets->where('status', 'available')->sum('quantity') + $transactions->sum('quantity')) * 100);

        // dd($data_sold_out);
        $data_total = 0;
        $data_available = 0;
        foreach ($tickets as $key => $value) {
            $data_total += $value->quantity;
            if($value->status == "available"){
                $data_available += $value->quantity; 
            }
        }

        return response()->json(['tickets' => $tickets, 'data_total' => $data_total, 'data_available' => $data_available, 'data_sold_out' => $data_sold_out], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        dd($ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validator = Validator::make($request->all(), [
            'ctgT_id' => 'required',
            'event_id' => 'required',
            'ticket_name' => 'required|string|max:255',
            'start_sale' => 'required|date',
            'end_sale' => 'required|date|after_or_equal:start_sale',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after_or_equal:start_time',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|string|max:255',
            'ticket_photo' => 'image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:50000',
        ]);

        if ($validator->passes()) {
            if ($request->hasFile('ticket_photo')) 
            {
                $ticket_photo = $request->file('ticket_photo');
                $new_ticket = Str::random(40) . '.' . $ticket_photo->getClientOriginalExtension();
                $ticket_photo->move(public_path("assets3/ticket_photo"), $new_ticket);
                Ticket::where('id', $ticket->id)
                        ->update([
                            'ticket_photo' => $new_ticket
                        ]);
            }

            $ticket = Ticket::where('id', $ticket->id)
                            ->update([
                            'ticket_name' => $request->ticket_name,
                            'ctgT_id' => $request->ctgT_id,
                            'description' => $request->description,
                            'price' => $request->price,
                            'start_sale' => $request->start_sale,
                            'end_sale' => $request->end_sale,
                            'start_time' => $request->start_time,
                            'end_time' => $request->end_time,
                            'quantity' => $request->quantity,
                            // 'status' => "available",
                            'event_id' => $request->event_id,
                        ]);
            
            return response()->json(['success' => "true"], 200);
        } else {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        try {
            $ticket->delete();
            return response()->json(['success' => "true"], 200);
        } catch (Exception $e) {
            return response()->json(['errors' => $e], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function disable(Ticket $ticket)
    {
        Ticket::where('id', $ticket->id)
                        ->update([
                            'status' => "disable"
                        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function enable(Ticket $ticket)
    {
        Ticket::where('id', $ticket->id)
                        ->update([
                            'status' => "available"
                        ]);

        return redirect()->back();
    }
}
