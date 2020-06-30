@extends("layouts.admin")

@section("title","Create New Country")


@section("content")


<form method="post" action="{{ route('post-country') }}" role="form">
@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Country Name</label>
                    <input value='{{old("name")}}' type="text" class="{{ $errors->has('name')?"is-invalid":""}} form-control" id="name" name="name" placeholder="Enter Country Name">
                  </div>
                  <div class="form-group">
                    <label for="title">ISO2</label>
                    <input value='{{old("ISO2")}}' type="text" class="{{ $errors->has('ISO2')?"is-invalid":""}} form-control" id="ISO2" name="ISO2" placeholder="Enter ISO2">
                  </div>
                  <div class="form-group">
                    <label for="title">code</label>
                    <input value='{{old("code")}}' type="text" class="{{ $errors->has('code')?"is-invalid":""}} form-control" id="code" name="code" placeholder="Enter Code">
                  </div>
               
                <div class="form-group">
                  <label for="title">area</label>
                  <input value='{{old("area")}}' type="NUMBER" class="{{ $errors->has('code')?"is-invalid":""}} form-control" id="area" name="area" placeholder="Enter Area">
                </div>
            
              <div class="form-group">
                <label for="title">population</label>
                <input value='{{old("population")}}' type="number" class="{{ $errors->has('code')?"is-invalid":""}} form-control" id="population" name="population" placeholder="Enter Population">
              </div>
            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class='btn btn-default' href='{{ asset("/country") }}'>Cancel</a>
                </div>
              </form>
@endsection
