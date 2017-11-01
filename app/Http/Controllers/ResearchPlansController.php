<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResearchPlan;
use App\Department;

class ResearchPlansController extends Controller
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
		$plans = ResearchPlan::all();

		return view('research_plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

		return view('research_plans.create', compact('departments'));
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
            'description' => 'required|between:4,50',
			'department_id' => 'required|integer',
		]);

		ResearchPlan::create([
            'description' => $request['description'],
			'department_id' => $request['department_id'],
		]);

		return redirect()->route('researchPlans.index')->with('alert-class', 'alert-success')->with('message', __('Added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$research_plans = ResearchPlan::find($id);
        $departments = Department::all();

		return view('research_plans.show', compact('research_plans','departments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$plan = ResearchPlan::find($id);
        $departments = Department::all();

		return view('research_plans.edit', compact('plan','departments'));
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
            'description' => 'required|between:4,50',
            'department_id' => 'required|integer',
		]);

		$research_plans = ResearchPlan::find($id);

		if ($research_plans)
		{
			$research_plans->update([
				'description' => $request['description'],
            'department_id' => $request['department_id'],
			]);

			return redirect()->route('researchPlans.index')->with('alert-class', 'alert-success')->with('message', __('Updated'));
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
		$research_plans = ResearchPlan::find($id);

		if ($research_plans)
		{
			$research_plans->delete();

			return redirect()->route('researchPlans.index')->with('alert-class', 'alert-success')->with('message', __('Deleted'));
		}
    }
}