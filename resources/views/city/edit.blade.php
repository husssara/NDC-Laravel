@extends("layouts.admin")

@section("title", "Edit City")

@section("content")
<form role="form" method="post" action="{{ route("city.update", $city->id) }}">
        <!--input type="hidden" name="_method" value="PUT" /-->
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">City Name</label>
                    <input value='{{ $city->name }}' type="text" class="form-control" id="name" name="name" placeholder="Enter City Name">
                </div>
       
           


            <div class="col">
                <div class="form-group">
                    <label for="country_id">Country_id</label>
                    <select name="country_id" class="form-control">
                        <option>Select Country</option>
                        @foreach($country as $country)
                            <option  {{$country->id == $city->country_id?"selected":""}} value='{{$country->id}}'>{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
          
       
    
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="old_price">latlng</label>
                    <input value='{{ $city->latlng }}' type="text" class="form-control" id="latlng" name="latlng" placeholder="Enter city position">
                </div>
            </div>
           
        </div>


        <div class="form-check">
            <input {{ (old('active')??$city->active)?"checked":"" }} value='1' type="checkbox" name='active' class="form-check-input" id="active">
            <label class="form-check-label" for='active'>Active</label>
          </div>
          
    
          
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class='btn btn-default' href='{{ route("city.index") }}'>Cancel</a>
    </div>
    </div>
</form>
@endsection
