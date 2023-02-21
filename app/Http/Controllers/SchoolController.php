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
        $schools = School::with(['area', 'city'])->get();
        return view('School/school', compact('schools'));
    }

    public function getArea(Request $request){
        
        $city_id=$request->city_id;
        $area_data=Area::where('city_id',$city_id)->get();
        return response()->json($area_data);
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
        return view('School/createschool', compact('cities', 'areas'));
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
            'school' => 'required|regex:/^[a-zA-Z\s]*$/|unique:schools,name',
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
        return view('School/updateschool', ['school' => $schools], compact('cities', 'areas'));
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
            'school' => 'required|regex:/^[a-zA-Z\s]*$/',
            'city' => 'required',
            'area' => 'required',
        ]);
        
        $school = School::find($school_id);
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
