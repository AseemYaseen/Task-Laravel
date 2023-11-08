@extends('Admin.layouts.master')
@section('title')

@endsection

@section('css')
<style>
.desss{
    width: 100%;
    height: 75px;
    display: inline;
}

</style>
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
              <h3 class="card-title">Edit User</h3>
            </div> 

            <form action="{{route('users.show',$UserEdit->id)}}" method="post" enctype="multipart/form-data"> 
                @method('PUT')
                @csrf
               <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">User Name</label>
                  <input type="text" class="form-control" name="name" value="{{$UserEdit->name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">User Email</label>
                  <input type="text" class="form-control desss" name="email" value="{{$UserEdit->email}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">User Password</label>
                  <input type="password" class="form-control desss" name="password" value="{{$UserEdit->password}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="image">
                      <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                  </div>

                  <div class="form-group">
                    <label for="role">User Role</label><br>
                    <label class="radio-inline">
                        <input type="radio" name="role" value="user" {{ $UserEdit->is_admin == 0 ? 'checked' : '' }}> User
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="role" value="admin" {{ $UserEdit->is_admin == 1 ? 'checked' : '' }}> Admin
                    </label>
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











