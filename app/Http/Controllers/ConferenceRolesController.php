<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConferenceRole;

class ConferenceRolesController extends Controller
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
		$roles = ConferenceRole::all();

		return view('conference_roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('conference_roles.create');
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
			'role' => 'required|between:4,50'
		]);

        ConferenceRole::create([
			'role' => $request['role']
		]);

		return redirect()->route('conferenceRole.index')->with('alert-class', 'alert-success')->with('message', __('Added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$roles = ConferenceRole::find($id);

		return view('conference_roles.show', compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$roles = ConferenceRole::find($id);

		return view('conference_roles.edit', compact('roles'));
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
			'role' => 'required|between:4,50'
		]);

		$roles = ConferenceRole::find($id);

		if ($roles)
		{
			$roles->update([
				'role' => $request['role']
			]);

			return redirect()->route('conferenceRole.index')->with('alert-class', 'alert-success')->with('message', __('Updated'));
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
		$roles = ConferenceRole::find($id);

		if ($roles)
		{
			$roles->delete();

			return redirect()->route('conferenceRole.index')->with('alert-class', 'alert-success')->with('message', __('Deleted'));
		}
    }
}