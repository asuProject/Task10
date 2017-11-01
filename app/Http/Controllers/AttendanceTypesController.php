<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttendanceType;

class AttendanceTypesController extends Controller
{

    public $abilities = [
        'index'      =>      'options_view'  ,
        'show'       =>      'options_view'  ,
        'create'     =>      'options_add'  ,
        'store'      =>      'options_add'  ,
        'edit'       =>      'options_edit'  ,
        'update'     =>      'options_edit'  ,
        'destroy'    =>      'options_delete'  ,
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$types = AttendanceType::all();

		return view('attendance_types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('attendance_types.create');
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
			'type' => 'required|between:4,50'
		]);

		AttendanceType::create([
			'type' => $request['type']
		]);

		return redirect()->route('attendanceType.index')->with('alert-class', 'alert-success')->with('message', __('Added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$types = AttendanceType::find($id);

		return view('attendance_types.show', compact('types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$type = AttendanceType::find($id);

		return view('attendance_types.edit', compact('type'));
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
			'type' => 'required|between:4,50'
		]);

		$types = AttendanceType::find($id);

		if ($types)
		{
			$types->update([
				'type' => $request['type']
			]);

			return redirect()->route('attendanceType.index')->with('alert-class', 'alert-success')->with('message', __('Updated'));
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
		$types = AttendanceType::find($id);

		if ($types)
		{
			$types->delete();

			return redirect()->route('attendanceType.index')->with('alert-class', 'alert-success')->with('message', __('Deleted'));
		}
    }
}