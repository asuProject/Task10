<?php

namespace App\Http\Controllers\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$countries = Country::all();

		return view('country.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('country.country.create');
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
			'name' => 'required|between:3,25',
			'code' => 'required|size:3'
		]);

		Country::create([
			'name' => $request['name'],
			'code' => $request['code']
		]);

		return redirect()->route('country.country.index')->with('alert-class', 'alert-success')->with('message', __('Done!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$country = Country::find($id);

		return view('country.country.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$country = Country::find($id);

		return view('country.country.edit', compact('country'));
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
			'name' => 'required|between:3,25',
			'code' => 'required|size:3'
		]);

		$country = Country::find($id);

		if ($country)
		{
			$country->update([
				'name' => $request['name'],
				'code' => $request['code']
			]);

			return redirect()->route('country.country.index')->with('alert-class', 'alert-success')->with('message', __('Done!'));
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
		$country = Country::find($id);

		if ($country)
		{
			$country->delete();

			return redirect()->route('country.country.index')->with('alert-class', 'alert-success')->with('message', __('Done!'));
		}
    }
}