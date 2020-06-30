@extends("layouts.admin")

@section("title","Countries")


@section("content")
<div class="col-4">
<a href="{{ route('create-country') }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New Country</a>
 <br>
 <br>
</div>
 <table align="center" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>ISO2</th>
            <th>code</th>
            <th>area</th>
            <th>population</th>
            <th width='10%'></th> 
            <th width='10%'></th> 

        </tr>
    </thead>
    <tbody>
        @foreach($country as $country)
        <tr>
            <td>{{ $country->id }}</td>
            <td>{{ $country->name }}</td>
            <td>{{ $country->ISO2 }}</td>
            <td>{{ $country->code}}</td>
            <td>{{ $country->area}}</td>
            <td>{{ $country->population}}</td>
            
            {{-- <a class='btn btn-info btn-sm'
            href="{{ route('create-country') }}">Edit</a></td> --}}
         <td>
             <a class='btn btn-info btn-sm' href='{{ asset("/country/edit/".$country->id) }}'> Edit</a>
             {{-- <a class='btn btn-info btn-sm' href='{{ route('edit-country', $country->id) }}'> Edit</a> --}}
        
         <td><a class='btn btn-danger btn-sm'onclick="return confirm('are you sure you want to delete?')" href={{ route("delete-country",$country->id) }}> Delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
