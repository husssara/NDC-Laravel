<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $q=$request->get("q")??"";
        $cities=City::where("name","like","%$q%")->paginate(2)->appends(["q"=>$q]);
       // $cities=City::paginate(2);
       return view("city.index")->with("cities",$cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country=Country::get();
        return view("city.create")->with("country",$country);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request-> validate([
            'name'=>'required',
            'country_id'=>'required',
            'latlng'=>'required',
           

        ]);
   


        City::insert([
            'name'=>$request->name,
            'country_id'=>$request->country_id,
            'latlng'=>$request->latlng,
        
        ]);
        \Session::flash("msg","city added successfuly");
        return redirect (route('city.index'));
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
        
        $city = City::find($id);
        $countries= Country::all();
        return view("city.show")->with("city",$city)->with("countries",$countries);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $city = City::find($id);
        $country = Country::all();
        return view("city.edit")->with("city",$city)->with("country",$country);
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
        //
        $request->validate([
            'name'=>'required',
            'country_id'=>'required',
            'latlng'=>'required',
        ]);

        
        City::where('id', $id)->update([
            'name'=>$request->name,
            'country_id'=>$request->country_id,
            'latlng'=>$request->latlng,
        ]);

        \Session()->flash("msg", " City Updated Successfully");
        return redirect(route("city.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        City::destroy($id);
        \Session()->flash("msg", "City Deleted Successfully");
        return redirect(route("city.index"));
    }
}
