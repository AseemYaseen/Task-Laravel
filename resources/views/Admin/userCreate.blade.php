  @extends('Admin.layouts.master')
@section('title')
Add Category
@endsection

@section('css')

@endsection

@section('title_page')

@endsection

@section('title_page2')

@endsection


@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
      
        <div class="col-md-8">
         
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create a User</h3>
            </div> 

            <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                @csrf
               <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">User Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">User Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">User Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">User Image</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="image">
                      <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                  </div>
                </div>
              </div>
              
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
    </section>
    
 @endsection  

@section('script')

@endsection  