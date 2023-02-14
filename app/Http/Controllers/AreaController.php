<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $areas = Area::with('city')->get();
        return view('area', compact('areas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        // $cities = City::orderBy('city_id', 'desc')->get('city_id');
        $cities = City::all();
        return view('createarea',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $validateData= $request->validate([
            'area'=>'required',
            'city' => 'required',
        ]);
        $area = new Area;
        $area->name = $request['area'];
        $area->city_id = $request['city'];
        $area->save();
        return redirect(route('areas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($area_id)
    {   
        $cities = City::all();
        $areas= Area::find($area_id);
        return view('updatearea',['areas'=>$areas],compact('cities'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $area_id)
    {   
        $validateData = $request->validate([
            'area'=>'required',
            'city' =>'required'
        ]);
        $area= Area::find($area_id);
        $area->name=$request->area;
        $area->city_id=$request->city;
        $area->save();
        return redirect(route('areas.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($area_id)
    {
        $area= Area::find($area_id);
        $area->delete();
        return redirect(route('areas.index'));   
    }
}
