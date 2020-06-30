@extends("layouts.admin")

@section("title","Cities")

@section("content")
<form class='row mb-3'>
    <div class='col-8'>
    <input name="q" autofocus type = "text" value='{{request()->get("q")}}' class="form-control" placeholder="Enter your search" >
    </div>
    <div class='col-2'>
        <button type = "submit" class="btn btn-primary" <i class="fa fa-search"></i> Search</a>
        </div>
        <br> <br>
        <div class= 'col-8'>
        <a href="{{ route('city.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Create New City</a>
        </div>

    </form>

<br>
<br>
@if($cities->count()>0)
<table align="center" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Country_id</th>
            <th>latlng</th>
            <th width='10%'></th> 
            <th width='10%'></th> 
            <th width='10%'></th> 
         

        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
        <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->name }}</td>
            <td>{{ $city->country_id }}</td>
            <td>{{ $city->latlng }}</td>
         
          <td>  
         <a class='btn btn-info btn-sm'
        href="{{ route('city.show',$city->id) }}">Show</a></td> 
      
        <td>  
            <a class='btn btn-info btn-sm'
           href="{{ route('city.edit',$city->id) }}">Edit</a></td> 
         
         <td><a class='btn btn-danger btn-sm'onclick="return confirm('are you sure you want to delete?')" href={{ route("delete-city",$city->id) }}> Delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="alert alert-warning">there is no results</div>
@endif
{{$cities->links()}}
@endsection

