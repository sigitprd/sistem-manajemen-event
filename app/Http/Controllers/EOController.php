<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Category_event;
use App\Category_ticket;
use App\E_organizer;
use App\Event;
use App\Ticket;
// use App\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class EOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('EO.index');
    }

    public function event()
    {
        $eo = \DB::table('e_organizers')->select('*')->where('user_id', Auth::user()->id)->first();

        $myevents = \DB::table('events')
                            ->leftJoin('category_events', 'events.ctgE_id', '=', 'category_events.id')
                            ->select('events.*', 'category_events.name_category AS Category_Event')
                            ->orderBy('events.id', 'DESC')
                            ->where('eo_id', $eo->id)
                            ->whereNull('events.deleted_at')
                            ->paginate(10);

        $category_events = \DB::table('category_events')->select('*')->orderBy('name_category', 'ASC')->get();
        return view('EO.myevent', compact('category_events', 'myevents'));
    }

    // public function ticket()
    // {
    //     $eo = \DB::table('e_organizers')->select('*')->where('user_id', Auth::user()->id)->first();
    //     $myevents = \DB::table('events')->select('*')->orderBy('event_name', 'DESC')->where('eo_id', $eo->id)->get();
    //     $category_tickets = \DB::table('category_tickets')->select('*');

    //     $tickets = \DB::table('tickets')
    //                     ->leftJoin('events', 'tickets.event_id', '=', 'events.id')
    //                     ->join('category_tickets', 'tickets.ctgT_id', '=', 'category_tickets.id')
    //                     ->select('tickets.*', 'events.event_name', 'events.eo_id', 'category_tickets.name_category AS Category_Ticket')
    //                     ->orderBy('Category_Ticket', 'ASC')
    //                     ->where('eo_id', $eo->id)
    //                     ->get();

    //     return view('EO.tickets', compact('category_tickets', 'myevents', 'tickets'));
    // }

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
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'event_name' => 'required|string|max:255',
            'ctgE_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'event_address' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'terms_condition' => 'required|string|max:255',
            'event_photo' => 'required|image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:50000',
            'support_doc' => 'required|file|max:10000|mimes:pdf,docx,doc',
            'npwp' => 'image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:7000',
        ]);

        if ($validator->passes()) {
            if ($request->hasFile('event_photo')) 
            {
                $img = $request->file('event_photo');
                $new_img = Str::random(40) . '.' . $img->getClientOriginalExtension();
                $img->move(public_path("assets3/img"), $new_img);
            }

            if ($request->hasFile('support_doc')) 
            {
                $doc = $request->file('support_doc');
                $new_doc = Str::random(40) . '.' . $doc->getClientOriginalExtension();
                $doc->move(public_path("assets3/doc"), $new_doc);
            }

            if ($request->hasFile('npwp')) 
            {
                $npwp = $request->file('npwp');
                $new_npwp = Str::random(40) . '.' . $npwp->getClientOriginalExtension();
                $npwp->move(public_path("assets3/npwp"), $new_npwp);
            }else{
                $new_npwp = null;
            }

            $eo = \DB::table('e_organizers')->select('*')->where('user_id', Auth::user()->id)->first();
            
            $event = Event::create([
                            'event_name' => $request->event_name,
                            'event_address' => $request->event_address,
                            'description' => $request->description,
                            'start_date' => $request->start_date,
                            'end_date' => $request->end_date,
                            'ctgE_id' => $request->ctgE_id,
                            'event_photo' => $new_img,
                            'terms_condition' => $request->terms_condition,
                            'support_doc' => $new_doc,
                            'npwp' => $new_npwp,
                            'status' => "waiting",
                            'eo_id' => $eo->id,
                        ]);
           
            return redirect()->back();
        } else {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTicket(Request $request)
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
                            'status' => "available",
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, Event $event)
    {
        // dd($request->all());
        // dd($event->id);

        $validator = Validator::make($request->all(), [
            'event_name' => 'required|string|max:255',
            'ctgE_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'event_photo' => 'image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:50000',
            'event_address' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'terms_condition' => 'required|string|max:255',
        ]);

        if ($validator->passes()) {
            if ($request->hasFile('event_photo')) 
            {
                // dd($request->hasFile('event_photo'));
                $img = $request->file('event_photo');
                $new_img = Str::random(40) . '.' . $img->getClientOriginalExtension();
                $img->move(public_path("assets3/img"), $new_img);

                Event::where('id', $event->id)
                        ->update([
                            'event_photo' => $new_img,
                        ]);
            }

            $eo = \DB::table('e_organizers')->select('*')->where('user_id', Auth::user()->id)->first();
            
            $event = Event::where('id', $event->id)
                        ->update([
                            'event_name' => $request->event_name,
                            'event_address' => $request->event_address,
                            'description' => $request->description,
                            'start_date' => $request->start_date,
                            'end_date' => $request->end_date,
                            'ctgE_id' => $request->ctgE_id,
                            'terms_condition' => $request->terms_condition,
                            'eo_id' => $eo->id,
                        ]);
           
            return response()->json(['success' => "true"], 200);;
        } else {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function updateTicket(Request $request, Ticket $ticket)
    {
        // return $request->ticket_name;
        // dd($request->all());
        // dd($ticket->id);

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
            dd($request->all());
            // $eo = E_organizer::where('user_id', Auth::user()->id)->first();
            
            // $event = Event::where('id', $event->id)
            //             ->update([
            //                 'event_name' => $request->event_name,
            //                 'event_address' => $request->event_address,
            //                 'description' => $request->description,
            //                 'start_date' => $request->start_date,
            //                 'end_date' => $request->end_date,
            //                 'ctgE_id' => $request->ctgE_id,
            //                 'terms_condition' => $request->terms_condition,
            //                 'eo_id' => $eo->id,
            //             ]);
           
            // return response()->json(['success' => "true"], 200);;
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

    public function destroy(Event $event)
    {
        // dd($event);
        try {
            Ticket::where('event_id', $event->id)->delete();
            $event->delete();
            return response()->json(['success' => "true"], 200);
        } catch (Exception $e) {
            return response()->json(['errors' => $e], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function disable(Event $event)
    {
        Event::where('id', $event->id)
                        ->update([
                            'status' => "disable"
                        ]);
        Ticket::where('event_id', $event->id)
                        ->update([
                            'status' => "disable"
                        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function enable(Event $event)
    {
        Event::where('id', $event->id)
                        ->update([
                            'status' => "available"
                        ]);
        Ticket::where('event_id', $event->id)
                        ->update([
                            'status' => "available"
                        ]);

        return redirect()->back();
    }

    public function profile()
    {
        $user = \DB::table('users')->find(Auth::user()->id);
        $eo = \DB::table('e_organizers')->select('*')->where('user_id', $user->id)->first();
        return view('EO.profileEo', compact('user', 'eo'));
    }

    public function profileEoUpdate(Request $request, E_organizer $e_organizer)
    {
        $request->validate([
            'name_eo' => 'required|string|max:255',
            'phone_number_eo' => 'required|digits_between:8,12|numeric',
            'address_eo' => 'required|string|max:255',
            'photo' => 'image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:50000',
        ]);

        if($e_organizer->user_id == Auth::user()->id)
        {
            if ($request->hasFile('identity_card_eo')) 
            {
                $ident = $request->file('identity_card_eo');
                $new_ident = Str::random(40) . '.' . $ident->getClientOriginalExtension();
                $ident->move(public_path("assets3/identity_card"), $new_ident);

                E_organizer::where('id', $e_organizer->id)
                        ->update([
                            'identity_card_eo' => $new_ident,
                        ]);
            }

            E_organizer::where('id', $e_organizer->id)
                            ->update([
                                'name_eo' => $request->name_eo,
                                'phone_number_eo' => $request->phone_number_eo,
                                'address_eo' => $request->address_eo
                            ]);

            User::where('id', Auth::user()->id)
                ->update([
                    'phone_number' => $request->phone_number_eo,
                ]);

            return redirect()->route('profile.eo');
        }
        return abort(404);
    }

}
