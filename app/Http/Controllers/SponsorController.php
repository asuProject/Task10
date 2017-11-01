<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sponsor;
use App\Country;
use App\City;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$sponsors = Sponsor::all();

		return view('sponsor.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$countries = Country::all();
		$towns = City::all();

		return view('sponsor.create', compact('countries', 'towns'));
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
			'name' => 'required|between:3,50',
			'country_id' => 'required|numeric|exists:countries,id',
			'town_id' => 'required|numeric|exists:cities,id',
			'email' => 'required|email|between:6,30|unique:sponsors,email',
			'phone' => 'required|between:14,20',
			'website' => 'required|between:5,30',
			'comments' => 'between:0,65535'
		]);

		Sponsor::create([
			'name' => $request['name'],
			'country_id' => $request['country_id'],
			'city_id' => $request['town_id'],
			'email' => $request['email'],
			'phone' => $request['phone'],
			'website' => $request['website'],
			'comments' => $request['comments']
		]);

		return redirect()->route('sponsor.index')->with('alert-class', 'alert-success')->with('message', __('Done!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$sponsors = Sponsor::find($id);

		return view('sponsor.show', compact('sponsors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$sponsors = Sponsor::find($id);
		$countries = Country::all();
		$towns = City::all();

		return view('sponsor.edit', compact('sponsors', 'countries', 'towns'));
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
			'name' => 'required|between:3,50',
			'country_id' => 'required|numeric|exists:countries,id',
			'town_id' => 'required|numeric|exists:cities,id',
			'email' => 'required|email|between:6,30|unique:sponsors,email,' . $id,
			'phone' => 'required|between:14,20',
			'website' => 'required|between:5,30',
			'comments' => 'between:0,65535'
		]);

		$sponsor = Sponsor::find($id);

		if ($sponsor)
		{
			$sponsor->update([
				'name' => $request['name'],
				'country_id' => $request['country_id'],
				'city_id' => $request['town_id'],
				'email' => $request['email'],
				'phone' => $request['phone'],
				'website' => $request['website'],
				'comments' => $request['comments']
			]);

			return redirect()->route('sponsor.index')->with('alert-class', 'alert-success')->with('message', __('Done!'));
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
		$sponsor = Sponsor::find($id);

		if ($sponsor)
		{
			$sponsor->delete();

			return redirect()->route('sponsor.index')->with('alert-class', 'alert-success')->with('message', __('Done!'));
		}
    }
}