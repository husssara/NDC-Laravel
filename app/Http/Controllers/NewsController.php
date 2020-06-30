<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News; 
use App\Models\Category;
use Session;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsEditRequest;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q=$request->get("q"??"");
        $published =$request->get("published");
        
        $category =$request->get("category");
     
        $news=News::whereRaw('true');
        if($q){
        $news->where("title","like","%$q%");
    
        }

        if($published!=null){
          $news->where('published',$published);

        }
        if($category){
            $news->where('category_id',$category);
  
          }
        $news=$news->paginate(10)->appends([
            'q'=>$q,
            'published'=>$published,
        ]);
        
        $categories=Category::orderBy("title")->get();
        return view("news.index")->with("news",$news)->with("categories",$categories);
         //
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("news.create")->with("categories",$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
    

      
         $imageName = basename($request->imageFile->store("public"));
         $request['image'] = $imageName;

        if(!$request->published ){
            $request['published']=0;
        }
        News::create($request->all());

        session()->flash("msg", "s: News Created Successfully");
        return redirect(route("news.index"));
  
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::find($id);
        
        if(!$new){
            session()->flash("msg", "e: News was not found");
            return redirect(route("news.index"));
        }
     
        $categories = Category::all();
        return view("news.show")->withNew($new)->withCategories($categories);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::find($id);
        if(!$new){
            session()->flash("msg", "e: News was not found");
            return redirect(route("news.index"));
        }
        $categories = Category::all();
        return view("news.edit")->withNew($new)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsEditRequest $request, $id)
    {
        if(!$request->published ){
            $request['published']=0;
        }
     
        if($request->imageFile){
            $imageName = basename($request->imageFile->store("public"));
            $request['image'] = $imageName;
        }
    
        News::find($id)->update($request->all());
       
       
        session()->flash("msg", "i: News Updated Successfully");
        return redirect(route("news.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        session()->flash("msg", "w: News Deleted Successfully");
        return redirect(route("news.index"));
    }
}
