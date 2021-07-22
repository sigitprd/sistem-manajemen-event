<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Category_event;
use App\Category_ticket;
use App\E_organizer;
use App\Event;
use App\Ticket;
use Illuminate\Http\Request;

use Faker\Factory as Faker;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //build test
    // public function runDataEO()
    // {
    //     $faker = Faker::create();
    //     $get_user = User::select('id', 'name', 'role')->get();

    //     foreach ($get_user as $key => $value) {
    //         if($value->role == 'eo')
    //         {
    //             E_organizer::create([
    //                 'name_eo' => $value->name,
    //                 'address_eo' => $faker->address,
    //                 'phone_number_eo' => $faker->phoneNumber,
    //                 'identity_card_eo' => 'user.png',
    //                 'status' => $faker->randomElement(['waiting', 'confirmed']),
    //                 'user_id' => $value->id
    //             ]);
    //         }
    //     } \DB::table('e_organizers')->

    //     return redirect()->route('admin_index');
    //     // return view('EO.index');
    // }

    // public function runUpdateEO()
    // {
    //     $getEO = E_organizer::select('id', 'identity_card_eo')->get();
    //     foreach ($getEO as $key => $value) {
    //         if($value->id > 10){
    //             E_organizer::where('id', $value->id)->update([
    //                 'identity_card_eo' => 'id.png',
    //             ]);
    //         }
    //     }
    //     return redirect()->route('admin_index');
    // }

    public function index()
    {
        return view('admin.index');
    }

    public function eo_waiting()
    {
        $eos = \DB::table('e_organizers')->select('*')
                        ->orderBy('updated_at', 'DESC')
                        ->where('status', 'waiting')
                        ->paginate(10);

        return view('admin.EO.eo_waiting', compact('eos'));
    }

    public function eo_confirmed()
    {
        $eos = \DB::table('e_organizers')->select('*')
                        ->orderBy('updated_at', 'DESC')
                        ->where('status', 'confirmed')
                        ->paginate(10);

        return view('admin.EO.eo_confirmed', compact('eos'));
    }

    public function eo_rejected()
    {
        $eos = \DB::table('e_organizers')->select('*')
                        ->orderBy('updated_at', 'DESC')
                        ->where('status', 'rejected')
                        ->paginate(10);

        return view('admin.EO.eo_rejected', compact('eos'));
    }

    public function events_waiting()
    {
        $myevents = \DB::table('events')
                            ->leftJoin('category_events', 'events.ctgE_id', '=', 'category_events.id')
                            ->join('e_organizers', 'events.eo_id', '=', 'e_organizers.id')
                            ->select('events.*', 'category_events.name_category AS Category_Event', 'e_organizers.name_eo')
                            ->orderBy('events.updated_at', 'DESC')
                            ->where('events.status', "waiting")
                            ->whereNull('events.deleted_at')
                            ->paginate(10);

        return view('admin.Events.events_waiting', compact('myevents'));
    }

    public function events_available()
    {
        $myevents = \DB::table('events')
                            ->leftJoin('category_events', 'events.ctgE_id', '=', 'category_events.id')
                            ->join('e_organizers', 'events.eo_id', '=', 'e_organizers.id')
                            ->select('events.*', 'category_events.name_category AS Category_Event', 'e_organizers.name_eo')
                            ->orderBy('events.updated_at', 'DESC')
                            ->where('events.status', "available")
                            ->whereNull('events.deleted_at')
                            ->paginate(10);

        return view('admin.Events.events_available', compact('myevents'));
    }

    public function events_disable()
    {
        $myevents = \DB::table('events')
                            ->leftJoin('category_events', 'events.ctgE_id', '=', 'category_events.id')
                            ->join('e_organizers', 'events.eo_id', '=', 'e_organizers.id')
                            ->select('events.*', 'category_events.name_category AS Category_Event', 'e_organizers.name_eo')
                            ->orderBy('events.updated_at', 'DESC')
                            ->where('events.status', "disable")
                            ->whereNull('events.deleted_at')
                            ->paginate(10);

        return view('admin.Events.events_disable', compact('myevents'));
    }

    public function events_rejected()
    {
        $myevents = \DB::table('events')
                            ->leftJoin('category_events', 'events.ctgE_id', '=', 'category_events.id')
                            ->join('e_organizers', 'events.eo_id', '=', 'e_organizers.id')
                            ->select('events.*', 'category_events.name_category AS Category_Event', 'e_organizers.name_eo')
                            ->orderBy('events.updated_at', 'DESC')
                            ->where('events.status', "rejected")
                            ->whereNull('events.deleted_at')
                            ->paginate(10);

        return view('admin.Events.events_rejected', compact('myevents'));
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
    public function update(Request $request, $id)
    {
        //
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

    public function confirmEO(E_organizer $e_organizer)
    {
        E_organizer::where('id', $e_organizer->id)
                    ->update([
                        'status' => 'confirmed'
                    ]);
        User::where('id', $e_organizer->user_id)
                    ->update([
                        'role' => 'eo'
                    ]);
        return response()->json(['success' => true], 200);
    }

    public function rejectEO(E_organizer $e_organizer)
    {
        E_organizer::where('id', $e_organizer->id)
                    ->update([
                        'status' => 'rejected'
                    ]);
        return response()->json(['success' => true], 200);
    }

    public function destroyEO(E_organizer $e_organizer)
    {
        E_organizer::destroy($e_organizer->id);
        return response()->json(['success' => true], 200);
    }

    public function confirmEvent(Event $event)
    {
        Event::where('id', $event->id)
                ->update([
                    'status' => 'available'
                ]);

        if(count(Ticket::all()->where('event_id', $event->id)) > 0)
        {
            Ticket::where('event_id', $event->id)
                    ->update([
                        'status' => 'available'
                    ]);
        }

        return response()->json(['success' => true], 200);

    }

    public function rejectEvent(Event $event)
    {
        Event::where('id', $event->id)
                ->update([
                    'status' => 'rejected'
                ]);

        if(count(Ticket::all()->where('event_id', $event->id)) > 0)
        {
            Ticket::where('event_id', $event->id)
                    ->update([
                        'status' => 'rejected'
                    ]);
        }

        return response()->json(['success' => true], 200);

    }

    public function disableEvent(Event $event)
    {
        Event::where('id', $event->id)
                ->update([
                    'status' => 'disable'
                ]);

        if(count(Ticket::all()->where('event_id', $event->id)) > 0)
        {
            Ticket::where('event_id', $event->id)
                    ->update([
                        'status' => 'disable'
                    ]);
        }

        return response()->json(['success' => true], 200);

    }

    public function enableEvent(Event $event)
    {
        Event::where('id', $event->id)
                ->update([
                    'status' => 'available'
                ]);

        if(count(Ticket::all()->where('event_id', $event->id)) > 0)
        {
            Ticket::where('event_id', $event->id)
                    ->update([
                        'status' => 'available'
                    ]);
        }

        return response()->json(['success' => true], 200);

    }

    public function destroyEvent(Event $event)
    {
        // dd($event);

        if(count(Ticket::all()->where('event_id', $event->id)) > 0)
        {
            Ticket::where('event_id', $event->id)->forceDelete();
        }
        $event->forceDelete();

        return response()->json(['success' => "true"], 200);
    }
}
