<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConferenceType;

class ConferenceTypesController extends Controller
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
		$types = ConferenceType::all();

		return view('conference_types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('conference_types.create');
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
			'description' => 'required|between:4,255'
		]);

		ConferenceType::create([
			'description' => $request['description']
		]);

		return redirect()->route('conferenceType.index')->with('alert-class', 'alert-success')->with('message', 'تم إضافة نوع المؤتمر بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$type = ConferenceType::find($id);

		return view('conference_types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$type = ConferenceType::find($id);

		return view('conference_types.edit', compact('type'));
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
			'description' => 'required|between:4,255'
		]);

		$type = ConferenceType::find($id);

		if ($type)
		{
			$type->update([
				'description' => $request['description']
			]);

			return redirect()->route('conferenceType.index')->with('alert-class', 'alert-success')->with('message', 'تم تعديل نوع المؤتمر بنجاح');
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
		$type = ConferenceType::find($id);

		if ($type)
		{
			$type->delete();

			return redirect()->route('conferenceType.index')->with('alert-class', 'alert-success')->with('message', 'تم حذف نوع المؤتمر بنجاح');
		}
    }
}