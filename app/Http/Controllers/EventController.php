<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Event;
use App\Type;
use App\Comment;

class EventController extends Controller
{
    /*
     * GET /
     */
    public function index()
    {
        $events = Event::with('type')->orderBy('name')->get();

        return view('index')->with([
            'events' => $events,
        ]);
    }

    /*
    * GET /events/{id}
    */
    public function show($id)
    {
        $event = Event::find($id);

        $date_string = $event->month.'/'.$event->day.'/'.$event->year;
        $date = strtotime($date_string);
        $remaining = floor(($date - time()) / 86400);
        $event_over = false;
        if ($remaining < 0) {
            $remaining = 0;
            $event_over = true;
        }

        if (!$event) {
            return redirect('/')->with([
                'alert' => 'The event you were looking for was not found.',
            ]);
        }

        return view('events.show')->with([
            'event' => $event,
            'remaining' => $remaining,
            'event_over' => $event_over
        ]);
    }

    /*
    * GET /events/{id}/edit
    */
    public function edit($id)
    {

        $event = Event::find($id);
        $types = Type::getForDropdown();

        if (!$event) {
            return redirect('/')->with([
                'alert' => 'The event you were looking for was not found.',
            ]);
        }

        return view('events.edit')->with([
            'event' => $event,
            'types' => $types,
        ]);
    }

    public function update(Request $request, $id)
    {

        # Validate the request data
        $request->validate([
            'name' => 'required',
            'type_id' => 'required',
            'month' => 'required',
            'day' => 'required',
            'year' => 'required'
        ]);

        $event = Event::find($id);
        $event->name = $request->name;
        $event->type_id = $request->type_id;
        $event->month = $request->month;
        $event->day = $request->day;
        $event->year = $request->year;

        $event->save();

        return redirect('events/'.$id.'')->with([
            'alert' => 'Your changes were saved.'
        ]);
    }

    /*
    * DELETE /events/{id}
    */
    public function destroy($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return redirect('/')->with([
                'alert' => 'The event you were looking for was not found.',
            ]);
        }

        $name = $event->name;
        $event->delete();

        return redirect('/')->with([
            'alert' => 'The event '. $name .' was deleted.'
        ]);
    }

    /*
    * GET /events/create
    */
    public function create()
    {
        $types = Type::getForDropdown();
        return view('events.create')->with([
            'types' => $types,
        ]);
    }

    /**
     * POST /events
     * Process the form for adding a new event
     */
    public function store(Request $request)
    {

        # Validate the request data
        $request->validate([
            'name' => 'required',
            'type_id' => 'required',
            'month' => 'required',
            'day' => 'required',
            'year' => 'required'
        ]);

        $event = new Event();
        $event->name = $request->name;
        $event->type_id = $request->type_id;
        $event->month = $request->month;
        $event->day = $request->day;
        $event->year = $request->year;

        $event->save();

        return redirect('/')->with([
            'alert' => 'The event '. $event->name .' was added.'
        ]);
    }

}
