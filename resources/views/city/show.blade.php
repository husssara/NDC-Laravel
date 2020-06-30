@extends("layouts.admin")

@section("title",  $city->name )

@section("content")
<form role="form">
        
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">city Name</label>
                    <input value='{{ $city->name }}' type="text" readonly class="form-control" id="title" name="title" placeholder="">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="country_id">Country</label>
                    <select disabled name="country_id" class="form-control">
                        <option>Select Country</option>
                        @foreach($countries as $country)
                            <option  {{$country->id == $city->country_id?"selected":""}} value='{{$country->id}}'>{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            

        </div>
        
         
        <div class="col">
            <div class="form-group">
                <label for="title">latlng</label>
                <input value='{{ $city->latlng }}' type="text" readonly class="form-control" id="latlng" name="latlng" placeholder="">
            </div>
        </div>
        <div class="form-check">
            <input {{ (old('active')??$city->active)?"checked":"" }} value='1' type="checkbox" disabled name='active' class="form-check-input" id="active">
            <label class="form-check-label" for='active'>Active</label>
          </div>

    <div class="card-footer">
        <a class='btn btn-default' href='{{ route("city.index") }}'>Cancel</a>
    </div>
</form>
@endsection
