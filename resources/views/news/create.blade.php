@extends("layouts.admin")

@section("title","Create New News")


@section("content")


<form method="post" enctype="multipart/form-data" action="{{ route('news.store') }}" role="form">
@csrf
                <div class="card-body">
                <div class="form-group row">
                  <div class='col-sm-6'>
                    <label for="title">News Title</label>
                    <input type="text" value='{{old("title")}}' class="{{ $errors->has('title')?"is-invalid":""}} form-control" id="title" name="title" placeholder="Enter News Title ">
                  </div>
                </div>

                  <div class="form-group row ">
                    <div class='col-sm-6'>
                    <label for="summary">Summary</label>
                    <input type="text" value='{{old("summary")}}' class="{{ $errors->has('summary')?"is-invalid":""}} form-control" id="summary" name="summary" placeholder="Enter Summary">
                  </div>
                  </div>

                  <div class="form-group row">
                    <div class='col-sm-6'>
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option {{old('category_id')==$category->id?"selected":""}} value='{{$category->id}}'>{{$category->id}} - {{$category->title}}</option>
                    @endforeach
                </select>
                    </div>
            </div>
            <div class="form-group row">
              <div class='col-sm-6'>
                  <label for="imageFile">Image</label>
                  <div class="custom-file">
                      <input type="file" name="imageFile" class="custom-file-input" id="imageFile">
                      <label class="custom-file-label" for="image">Choose file</label>
                  </div>
              </div>
          </div>
            <div class="form-group row">
              <div class='col-sm-6'>
                <label for="details">Details</label>
                <textarea class="form-control" id="details" name="details">{{ old('details') }}</textarea>
            </div>
            </div>
            <div class="form-check">
                    <input  {{old('published')?"checked":"" }} value='1' type="checkbox" name='published' class="form-check-input" id="published">
                    <label class="form-check-label" for='published'>Published</label>
                  </div>
                
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class='btn btn-default' href='{{  route("news.index")}}'>Cancel</a>
                </div>
              </form>
@endsection

@section("js")
    <script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
    </script>
@endsection