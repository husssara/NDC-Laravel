@extends("layouts.admin")

@section("title", "Create City")

@section("content")
<form method="post" action="{{ route('city.store') }}" role="form">
  
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">City Name</label>
                <input value='{{ old("name") }}' type="text" autofocus class="form-control" id="name" name="name" placeholder="Enter City name">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="country_id">Country</label>
                <select name="country_id" class="form-control">
                    <option>Select Country</option>
                    @foreach($country as $country)
                        <option {{old('country_id')==$country->id?"selected":""}} value='{{$country->id}}'>{{$country->id}} - {{$country->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>     
    
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="latlng">latlng</label>
            <input value='{{old("latlng")}}' type="text" class="form-control" id="latlng" name="latlng" placeholder="Enter position of city ">
            </div>
        </div>
       
    </div>
 
    <div class="form-check">
        <input {{ old('active')?"checked":"" }} value='1' type="checkbox" name='active' class="form-check-input" id="active">
        <label class="form-check-label" for='active'>Active</label>
      </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class='btn btn-default' href='{{ route("city.index") }}'>Cancel</a>
    </div>
</form>
@endsection
