

@extends("layouts.admin")

@section("title", "News")

@section("content")
<form class='row mb-3 mt-3'>
    <div class='col-6'>
        <input name="q" autofocus type="text" value='{{ request()->get("q") }}' class="form-control" placeholder="Enter your search"/>
    </div>

    <div class='col-2'>
        <select name="published"  class="form-control">
        <option value =''> Any status </option>
        <option {{ request()->get("published") ? "selected":"" }} value='1'> Active </option>
        <option {{ request()->get("published")=='0' ? "selected":"" }} value ='0'> Inactive </option>
        </select>
   </div>
   <div class='col-2'>
    <select name="category"  class="form-control">
    <option value =''> Any Category </option>
    @foreach ($categories as $category)
        
  
    <option {{ $category->id==request()->get("category") ? "selected":"" }} value={{$category->id}}>{{$category->title}}</option>
    @endforeach
</select>
</div>


    <div class='col-2'>
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
    </div>
    

<div class="col-2 mt-3">
<a href="{{ route("news.create") }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New News</a>
</div>

</form>
@if($news->count()>0)
<table align="center" class="table table-striped mt-3 table-bordered">
    <thead>
        <tr>
            <th width=200> Image </th>
            <th>Title</th>
            <th>Category</th>
            <th>Summary</th>
            <th> Details</th>
            <th>Published</th>
            <th width="20%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($news as $new)
        <tr>
            <td><img width="80"src="{{ asset ("storage/".$new->image)}}"></td>
            <td><a href="{{ route("news.show", $new->id) }}">{{ $new->title }}</a></td>
            <td>{{$new->category->title??'' }}</td>
            <td>{{ $new->summary }}</td>
            <td>{{ $new->details }}</td>
            <td><input type="checkbox" disabled {{$new->published?"checked":"" }}/></td>
           
            <td width="20%">    <form method="post" action="{{ route('news.destroy', $new->id) }}">
                    <a href="{{ route("news.show", $new->id) }}" class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>
            
                    <a href="{{ route("news.edit", $new->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

                    <a href="{{ route("delete-news", $new->id) }}" onclick='return confirm("Are you sure dude?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>
            
                
                    @csrf
                    @method("DELETE")
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else 
<div class ="alert alert-warning"> No results found</div>
@endif
{{$news->links()}}
@endsection
