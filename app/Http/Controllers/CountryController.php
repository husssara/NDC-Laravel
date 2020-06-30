<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country; 
class CountryController extends Controller
{
    public function index(){
        $country= Country::get();
      
        return view("country.index")->with("country",$country);
    }
    public function create(){
        return view("country.create");
    }
    
    public function postCreate(Request $request){
       

        $request->validate([
            'name' => 'required',
            'ISO2' => ['required','max:2'],
            'code' => 'required',
            'area' => 'required',
            'population' => 'required'
        ]);

      
        Country::insert([
            'name' => $request->name,
            'ISO2' => $request->ISO2,
            'code' => $request->code,
            'area' => $request->area,
            'population' => $request->population
            
        ]);
         \Session::flash("msg","country added successfuly");
        return redirect(asset('/country'));
    }
    public function delete($id){
        Country::where('id',$id)->delete();
        \Session::flash("msg","country deleted successfuly");
        return redirect(asset('/country'));

    }
    public function edit($id){
        //find works on Primary key only and return null or 1 object
        $country = Country::find($id);
        return view("country.edit")->withCountry($country);  
    }
    

    public function postEdit($id){
        $request = request();
        $request->validate([
            'name' => 'required',
            'ISO2' => ['required','max:2'],
            'code' => 'required',
            'area' => 'required',
            'population' => 'required'
        ]);

        Country::where('id',$id)->update([
            'name' => $request->name,
            'ISO2' => $request->ISO2,
            'code' => $request->code,
            'area' => $request->area,
            'population' => $request->population
            
        ]);
        \Session::flash("msg","country updated successfuly");
        return redirect(asset('/country'));

    }
}
