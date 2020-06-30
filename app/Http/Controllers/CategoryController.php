<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\News;
use Session;

class CategoryController extends Controller
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
        $categories=Category::where("title","like","%$q%")->paginate(2)->appends(["q"=>$q]);

        return view("category.index")->with("categories",$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if(!$request->show ){
            $request['show']=0;
        }
        Category::create($request->all());

        Session()->flash("msg", "s: Category Created Successfully");
        return redirect(route("categories.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if(!$category){
            Session()->flash("msg", "e: Category was not found");
            return redirect(route("categories.index"));
        }
       
        return view("category.show")->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if(!$category){
            Session()->flash("msg", "e: Category was not found");
            return redirect(route("categories.index"));
        }
        return view("category.edit")->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        if(!$request->show ){
            $request['show']=0;
        }
        $category=Category::find($id);
        $category->update($request->all());

        session()->flash("msg", "i: Category Updated Successfully");
        return redirect(route("categories.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $category=Category::find($id);
        if($category->news->count()>0){
            Session()->flash("msg", "w: Cant delete because of news");
            return redirect(route("categories.index"));


        }
        Category::destroy($id);
        Session()->flash("msg", "w: Category Deleted Successfully");
        return redirect(route("categories.index"));
    }
}

    