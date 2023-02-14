<?php

namespace App\Http\Controllers;

use  App\Models\City;
use App\Models\Area;
use App\Models\School;
use Illuminate\Http\Request;


class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $schools = School::join('cities' ,'cities.id', '=' ,'schools.city_id' )
        // ->join('areas','areas.id','=','schools.area_id')->get(['schools.id','schools.name','areas.name']);


        $schools = School::with(['area', 'city'])
            ->get();
        return view('school', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $areas = Area::all();
        return view('createschool', compact('cities', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'school' => 'required',
            'city' => 'required',
            'area' => 'required',
        ]);

        $school = new School;
        $school->name = $request['school'];
        $school->city_id = $request['city'];
        $school->area_id = $request['area'];
        $school->save();
        return redirect(route('schools.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($school_id)
    {
        $schools = School::find($school_id);
        $cities = City::all();
        $areas = Area::all();
        return view('updateschool', ['school' => $schools], compact('cities', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $school_id)
    {
        $validateData = $request->validate([
            'school' => 'required',
            'city' => 'required',
            'area' => 'required',
        ]);
        
        $school = school::find($school_id);
        $school->name = $request->school;
        $school->city_id = $request->city;
        $school->area_id = $request->area;
        $school->save();
        return redirect(route('schools.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($school_id)
    {
        $school = School::find($school_id);
        $school->delete();
        return redirect(route('schools.index'));
    }
}
