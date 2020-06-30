@extends("layouts.admin")

@section("title","$new->title")


@section("content")


<form  role="form">
                <div class="card-body">
                <div class="form-group">
                    <label for="title">News Title</label>
                    <input type="text" value='{{ $new->title }}' readonly class="{{ $errors->has('title')?"is-invalid":""}} form-control" id="title" name="title" placeholder="Enter News Title ">
                  </div>
                  <div class="form-group">
                    <label for="summary">Summary</label>
                    <input type="text" value='{{ $new->summary }}'  readonly class="{{ $errors->has('summary')?"is-invalid":""}} form-control" id="summary" name="summary" placeholder="Enter Summary">
                  </div>

                  <div class="form-group">
                    <label for="category_id">Category</label>
                        <select disabled name="category_id" class="form-control">
                            <option>Select Category</option>
                            @foreach($categories as $category)
                                <option  {{$category->id == $new->categories_id?"selected":""}} value='{{$category->id}}'>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group row">
                      <div class='col-sm-6'>
                          <label for="imageFile">Image</label>
                     <div><img src="{{ asset ("storage/".$new->image)}}" width=200 class='img-thumbnail mt-3' alt=""></div>
                    </div> 
                      </div>
                
                 
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea  readonly class="form-control" id="details" name="details"> {{ $new->details }}</textarea>
                  </div>
               
                
                  <div class="form-check">
                    <input {{ $new->published?"checked":"" }} value='1' type="checkbox"  disabled name='published' class="form-check-input" id="published">
                    <label class="form-check-label" for='published'>Published</label>
                  </div>      
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
             
                  <a class='btn btn-default' href='{{  route("news.index")}}'>Back</a>
                </div>
              </form>
@endsection
