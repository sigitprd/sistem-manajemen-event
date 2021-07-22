<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Event;
use App\Ticket;
use App\Transaction;
use App\Detail_transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return true;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPayment(Transaction $transaction)
    {
        if($transaction->user_id == Auth::user()->id)
        {
            if($transaction->status == 'pending')
            {
                $tickets = \DB::table('detail_transactions')
                            ->leftJoin('tickets', 'detail_transactions.ticket_id', '=', 'tickets.id')
                            ->select('detail_transactions.*', 'tickets.ticket_name')
                            ->where('transaction_id', $transaction->id)
                            ->get();
                // dd($tickets);
                return view('checkout', compact('transaction', 'tickets'));
            }
            else
                return abort(404);
        }
        else
            return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePayment(Request $request, Transaction $transaction)
    {
        $detail_transactions = \DB::table('detail_transactions')->select('*')->where('transaction_id', $transaction->id)->get();
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'total_payment' => 'required|numeric|min:0|not_in:0'
        ]);

        if ($validator->passes()) {
            if($transaction->sub_total_order != $request->total_payment){
                return response()->json(['errors' => 'Your cash must be same with subtotal!'], 422);
            }

            foreach ($detail_transactions as $key => $value) {
                $ticket = \DB::table('tickets')->select('*')->where('id', $value->ticket_id)->first();

                if($ticket->deleted_at != null || ($ticket->status == "waiting" || $ticket->status == "disable" || $ticket->status == "rejected") ){
                    $transaction->update([
                        'status' => 'invalid'
                    ]);
                    return response()->json(['errors' => 'Invalid!. '.$ticket->ticket_name.' ticket purchased are '.$ticket->status. '!'], 422);
                }

                if($ticket->quantity > 0 ) {
                    if( ($ticket->quantity - $value->quantity) >= 0 ) {
                        Ticket::where('id', $ticket->id)->update([
                            'quantity' => $ticket->quantity - $value->quantity
                        ]);
                    }else{
                        $transaction->update([
                            'status' => 'invalid'
                        ]);
                        return response()->json(['errors' => 'Invalid!, ticket purchased are sold!'], 422);
                    }
                }else{
                    $transaction->update([
                        'status' => 'invalid'
                    ]);
                    return response()->json(['errors' => 'Invalid!, ticket purchased are sold!'], 422);
                }
            }
            
            $transaction->update([
                'total_payment' => $request->total_payment,
                'status' => 'completed'
            ]);

            return response()->json(['success' => "true"], 200);
        } else {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
