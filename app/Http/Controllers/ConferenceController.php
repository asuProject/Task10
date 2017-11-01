<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Conference;
use App\ConferenceType;
use App\Organizer;
use App\Country;
use App\City;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$conferences = Conference::all();

		return view('conference.conference.index', compact('conferences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$types = ConferenceType::all();
		$organizers = Organizer::where('type',3)->get();
		$countries = Country::all();
		$cities = City::all();

		return view('conference.conference.create', compact('types', 'organizers', 'countries', 'cities'));
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
			'type_id' => 'required|integer|min:1|exists:conference_types,id',
			'organizers_id' => 'required|array',
			'organizers_id.*' => 'exists:organizers,id',
			'country_id' => 'required|integer|min:1|exists:countries,id',
			'city_id' => 'required|integer|min:1|exists:cities,id',
			'name' => 'required|between:3,255',
			'start_date' => 'required|date',
			'website' => 'required|url',
			'comments' => 'between:0,65535'
		]);

		$conference = Conference::create([
			'conference_type_id' => $request['type_id'],
			'country_id' => $request['country_id'],
			'city_id' => $request['city_id'],
			'name' => $request['name'],
			'start_date' => $request['start_date'],
			'website' => $request['website'],
			'comments' => $request['comments']
		]);

		$organizers = Organizer::whereIn('id', $request['organizers_id'])->get();

		foreach ($organizers as $organizer) {
			$conference->Organizer()->attach($organizer['id']);
		}

		return redirect()->route('conference.conference.index')->with('alert-class', 'alert-success')->with('message', 'Done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$conference = Conference::find($id);

		return view('conference.conference.show', compact('conference'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$conference = Conference::find($id);
		$types = ConferenceType::all();
        $organizers = Organizer::where('type',3)->get();
		$countries = Country::all();
		$cities = City::all();

		return view('conference.conference.edit', compact('conference', 'types', 'organizers', 'countries', 'cities'));
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
			'type_id' => 'required|integer|min:1|exists:conference_types,id',
			'organizers_id' => 'required|array',
			'organizers_id.*' => 'exists:organizers,id',
			'country_id' => 'required|integer|min:1|exists:countries,id',
			'city_id' => 'required|integer|min:1|exists:cities,id',
			'name' => 'required|between:3,255',
			'start_date' => 'required|date',
			'website' => 'required|url',
			'comments' => 'between:0,65535'
		]);

		$conference = Conference::find($id);

		if ($conference)
		{
			$conference->update([
				'conference_type_id' => $request['type_id'],
				'country_id' => $request['country_id'],
				'city_id' => $request['city_id'],
				'name' => $request['name'],
				'start_date' => $request['start_date'],
				'website' => $request['website'],
				'comments' => $request['comments']
			]);

			$organizers = $conference->Organizer;

			foreach ($organizers as $organizer) {
				$conference->Organizer()->detach($organizer['id']);
			}

			$organizers = Organizer::whereIn('id', $request['organizers_id'])->get();

			foreach ($organizers as $organizer) {
				$conference->Organizer()->attach($organizer['id']);
			}

			return redirect()->route('conference.conference.index')->with('alert-class', 'alert-success')->with('message', 'Done!');
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
		$conference = Conference::find($id);

		if ($conference)
		{
			$organizers = $conference->Organizer;

			foreach ($organizers as $organizer) {
				$conference->Organizer()->detach($organizer['id']);
			}

			$conference->delete();

			return redirect()->route('conference.conference.index')->with('alert-class', 'alert-success')->with('message', 'Done!');
		}
    }
}