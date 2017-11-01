<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AttendingConference;
use App\ApprovalInfo;

class AttendingConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$attending = AttendingConference::all();

		return view('conference.attending.index', compact('attending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('conference.attending.create');
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
			'attendance_type_id' => 'required|integer|min:1|exists:attendance_types,id',
			'research_plan_id' => 'required|integer|min:1|exists:research_plans,id',
			'staff_id' => 'required|integer|min:1|exists:staffs,id',
			'sponsor_id' => 'required|integer|min:1|exists:sponsors,id',
			'request_date' => 'required|date',
			'flight_amount' => 'required|numeric|between:1,999999.99',
			'other_amount' => 'required|numeric|between:1,999999.99',
			'comments' => 'between:0,65535',

			'department_approval_date' => 'required|date',
			'faculty_approval_date' => 'required|date',
			'university_approval_date' => 'required|date',
			'university_decree_number' => 'required|between:3,255',
			'university_decree_document' => 'required|between:3,255'
		]);

		$info = ApprovalInfo::create([
			'department_approval_date' => $request['department_approval_date'],
			'faculty_approval_date' => $request['faculty_approval_date'],
			'university_approval_date' => $request['university_approval_date'],
			'university_decree_number' => $request['university_decree_number'],
			'university_decree_document' => $request['university_decree_document']
		]);

		AttendingConference::create([
			'conference_id' => $request['conference_id'],
			'attendance_type_id' => $request['attendance_type_id'],
			'research_plan_id' => $request['research_plan_id'],
			'staff_id' => $request['staff_id'],
			'sponsor_id' => $request['sponsor_id'],
			'approval_info_id' => $info['id'],
			'request_date' => $request['request_date'],
			'flight_amount' => $request['flight_amount'],
			'other_amount' => $request['other_amount'],
			'comments' => $request['comments']
		]);

		return redirect()->route('conference.attending.index')->with('alert-class', 'alert-success')->with('message', 'Done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$attending = ConferenceAttending::find($id);

		return view('conference.attending.show', compact('attending'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$attending = ConferenceAttending::find($id);

		return view('conference.attending.edit', compact('attending'));
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
			'conference_id' => 'required|integer|min:1|exists:conferences,id',
			'attendance_type_id' => 'required|integer|min:1|exists:attendance_types,id',
			'research_plan_id' => 'required|integer|min:1|exists:research_plans,id',
			'staff_id' => 'required|integer|min:1|exists:staffs,id',
			'sponsor_id' => 'required|integer|min:1|exists:sponsors,id',
			'request_date' => 'required|date',
			'flight_amount' => 'required|numeric|between:1,999999.99',
			'other_amount' => 'required|numeric|between:1,999999.99',
			'comments' => 'between:0,65535',

			'department_approval_date' => 'required|date',
			'faculty_approval_date' => 'required|date',
			'university_approval_date' => 'required|date',
			'university_decree_number' => 'required|between:3,255',
			'university_decree_document' => 'required|between:3,255'
		]);

		$attending = AttendingConference::find($id);

		if ($attending)
		{
			$attending->update([
				'conference_id' => $request['conference_id'],
				'attendance_type_id' => $request['attendance_type_id'],
				'research_plan_id' => $request['research_plan_id'],
				'staff_id' => $request['staff_id'],
				'sponsor_id' => $request['sponsor_id'],
				'request_date' => $request['request_date'],
				'flight_amount' => $request['flight_amount'],
				'other_amount' => $request['other_amount'],
				'comments' => $request['comments']
			]);

			$attending->ApprovalInfo()->update([
				'department_approval_date' => $request['department_approval_date'],
				'faculty_approval_date' => $request['faculty_approval_date'],
				'university_approval_date' => $request['university_approval_date'],
				'university_decree_number' => $request['university_decree_number'],
				'university_decree_document' => $request['university_decree_document']
			]);

			return redirect()->route('conference.attending.index')->with('alert-class', 'alert-success')->with('message', 'Done!');
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
		$attending = AttendingConference::find($id);

		if ($attending)
		{
			$attending->delete();

			return redirect()->route('conference.attending.index')->with('alert-class', 'alert-success')->with('message', 'Done!');
		}
    }
}