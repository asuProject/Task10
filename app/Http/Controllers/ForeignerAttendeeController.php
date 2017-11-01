<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForeignerAttendee;
use App\Country;
use App\City;
use Illuminate\Support\Facades\Input;

class ForeignerAttendeeController extends Controller
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
    public function index(){

		$foreigners = ForeignerAttendee::all();

		return view('foreigner_attendee.index', compact('foreigners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();

		return view('foreigner_attendee.create', compact('countries'));
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
            'name' => 'required|between:4,50',
            'country_id' => 'required|integer',
            'city_id' => 'required|integer',
		]);

		ForeignerAttendee::create([
                'name' => $request['name'],
                'country_id' => $request['country_id'],
                'city_id' => $request['city_id'],
		]);

		return redirect()->route('foreignerAttendee.index')->with('alert-class', 'alert-success')->with('message', __('Added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$foreigner = ForeignerAttendee::find($id);
        $countries = Country::all();

		return view('foreigner_attendee.show', compact('foreigner','countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$foreigner = ForeignerAttendee::find($id);
        $countries = Country::all();
        $cities = $foreigner->country->City;

		return view('foreigner_attendee.edit', compact('foreigner','countries','cities'));
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
            'name' => 'required|between:4,50',
            'country_id' => 'required|integer',
            'city_id' => 'required|integer',
		]);

		$foreigner_attendee = ForeignerAttendee::find($id);

		if ($foreigner_attendee)
		{
			$foreigner_attendee->update([
				'name' => $request['name'],
                'country_id' => $request['country_id'],
                'city_id' => $request['city_id'],
			]);

			return redirect()->route('foreignerAttendee.index')->with('alert-class', 'alert-success')->with('message', __('Updated'));
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
		$foreigner_attendee = ForeignerAttendee::find($id);

		if ($foreigner_attendee)
		{
			$foreigner_attendee->delete();

			return redirect()->route('foreignerAttendee.index')->with('alert-class', 'alert-success')->with('message', __('Deleted'));
		}
    }


// This function get cities by jquery
    public function get_cities()
        {
            $id = Input::get('id');
            $cities   = City::where('country_id',$id)->get();
            echo "<select name='city_id' class='form-control'";
            echo "<option value=''>". __('Choose city')."</option>";

            foreach ($cities as $city) {
                echo "<option value='".$city->id."'>".$city->name."</option>";
            }
            echo "</select>";
        }
    
}