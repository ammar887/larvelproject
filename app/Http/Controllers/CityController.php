<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('City/city', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('City/create_city');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate(
            [
                'city' => 'required|regex:/^[a-zA-Z\s]*$/|unique:cities,name',
            ]
        );
        $city = new City;
        $city->name = $request['city'];
        $city->save();
        return redirect(route('citys.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($city_id)
    {
        $city = City::find($city_id);
        return view('City/update_city', ['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $city_id)
    {
        $validatedata = $request->validate(
            [
                'city' => 'required|regex:/^[a-zA-Z\s]*$/'
            ]
        );

        $city = City::find($city_id);
        $city->name = $request->city;
        $city->save();

        return redirect(route('citys.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($city_id)
    {
        $city = City::find($city_id);
        $city->delete();
        return redirect(route('citys.index'));
    }
}
