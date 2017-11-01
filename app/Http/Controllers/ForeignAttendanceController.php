<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Conference;
use App\ConferenceRole;
use App\ForeignerAttendee;

class ForeignAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$attendees = ForeignerAttendee::all();

		return view('attendance.foreign.attendance.index', compact('attendees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$conferences = Conference::all();
		$attendees = ForeignerAttendee::all();

		return view('attendance.foreign.attendance.create', compact('conferences', 'attendees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'conference_id' => 'required|integer|min:1|exists:conferences,id',
			'attendee_id' => 'required|integer|min:1|exists:foreign_attendees,id',
			'role_id' => 'required|integer|min:1|exists:conference_roles,id'
		]);

		$attendee = ForeignerAttendee::find($request['attendee_id']);
		$attendee->Conference()->attach($request['conference_id'], ['role_id' => $request['role_id']]);

		return redirect()->route('attendance.foreign.attendance.index')->with('alert-class', 'alert-success')->with('message', 'Done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($attendee_id, $conference_id)
    {
		$conference = Conference::find($conference_id);
		$attendee = ForeignerAttendee::find($attendee_id);

		if ($conference && $attendee)
		{
			$role_id = $attendee->Conference()->where('id', '=', $conference->id)->first()->pivot->role_id;

			if ($role_id) {
				$role = ConferenceRole::find($role_id);

				return view('attendance.foreign.attendance.show', compact('conference', 'attendee', 'role'));
			}
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($attendee_id, $conference_id)
    {
		$conferences = Conference::all();
		$conference = Conference::find($conference_id);
		$attendee = ForeignerAttendee::find($attendee_id);

		if ($conference && $attendee)
		{
			$role_id = $attendee->Conference()->where('id', '=', $conference->id)->first()->pivot->role_id;

			if ($role_id) {
				$role = ConferenceRole::find($role_id);

				return view('attendance.foreign.attendance.edit', compact('conferences', 'conference', 'attendee', 'role'));
			}
		}
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
		$this->validate($request, [
			'old_conference_id' => 'required|integer|min:1|exists:conferences,id',
			'conference_id' => 'required|integer|min:1|exists:conferences,id',
			'role_id' => 'required|integer|min:1|exists:conference_roles,id'
		]);

		$attendee = ForeignerAttendee::find($id);

		if ($attendee)
		{
			$attendee->Conference()->detach($attendee['old_conference_id']);
			$attendee->Conference()->attach($request['conference_id'], ['role_id' => $request['role_id']]);

			return redirect()->route('attendance.foreign.attendance.index')->with('alert-class', 'alert-success')->with('message', 'Done!');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
		$this->validate($request, [
			'conference_id' => 'required|integer|min:1|exists:conferences,id'
		]);

		$attendee = ForeignerAttendee::find($id);

		if ($attendee)
		{
			$attendee->Conference()->detach($attendee['conference_id']);

			return redirect()->route('attendance.foreign.attendance.index')->with('alert-class', 'alert-success')->with('message', 'Done!');
		}
    }
}