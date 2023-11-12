@extends('Admin.layouts.master')
@section('title')
Users table
@endsection

@section('TheHead')
 Users Table
@endsection

@section('css')

@endsection

@section('title_page')

@endsection

@section('title_page2')
Users table
@endsection

@section('content')
<style>
    .DeleteB{
        background-color: rgb(255, 255, 255);
        color:rgb(253, 0, 0);
        border-radius:10px;
        padding:5px 10px;
        transition: 0.5s;
        border: none;
    }
    .DeleteB:hover{
        background-color: rgb(255, 0, 0);
        color:rgb(255, 255, 255);
    }
    /* .Editb{
        background-color: rgb(255, 255, 255);
        color:rgb(4, 88, 214);
        border-radius:10px;
        padding:5px 10px;
        transition: 0.5s;
    }
    .Editb:hover{
        background-color: rgb(4, 88, 214);
        color:rgb(255, 255, 255);
    } */
    .makeAdmin{
      background-color: rgb(255, 255, 255);
        color:rgb(22, 131, 0);
        border-radius:10px;
        padding:5px 10px;
        transition: 0.5s;
        border: none;
    }
    .makeAdmin:hover{
      background-color: rgb(22, 131, 0);
        color:rgb(255, 255, 255);
    }

    .ImgSty{
      width: 15%;
      height: 25%;
      
    }
    .immg{
      width: 40%;
      height: 80%;
      
    }

</style>
<div>
  <a href="{{route('users.create')}}" type="button" class="btn btn-inline bg-gradient-success btn-sm" style="">Creat User</a>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            </div>
          </div>
        </div>
        
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <?php
            $i = 1
            ?>
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($Users as $User)
                @if (!$User->is_admin == 1)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$User->name}}</td>
                <td>{{$User->email}}</td>
                @if ($User->image)
                <td class="immg"><img class="ImgSty" src="{{ asset('storage/image/' . $User->image) }}" alt="Image"></td>
            @else
                <td>No Image</td>
            @endif
                <td><a href="{{route('users.edit',$User->id)}}" type="button" class="Editb">Edit</a></td>
                <td><form class="butnMargin" onclick="return confirm('Are you sure you want to delete this user ?');" action="{{route('users.destroy', $User->id)}}" method="post">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="DeleteB">Delete</button>
                 </form></td>
                   {{-- </form></td>
                   <td><form class="butnMargin" action="{{route('users.update2', $User->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="makeAdmin">Make Admin</button>
                   </form></td> --}}
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
<h3 style="padding:120px 22px 0px 22px;">Admin table</h3>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $s=1
              ?>
                @foreach ($Users as $User)
                @if ($User->is_admin)
              <tr>
                <td>{{$s++}}</td>
                <td>{{$User->name}}</td>
                <td>{{$User->email}}</td>
                @if ($User->image)
                <td class="immg"><img class="ImgSty" src="{{ asset('storage/image/' . $User->image) }}" alt="Image"></td>
            @else
                <td>No Image</td>
            @endif
                <td><a href="{{route('users.edit',$User->id)}}" type="button" class="Editb">Edit</a></td>
                @if($User->id !== Auth::id())
                <td><form class="butnMargin" onclick="return confirm('Are you sure you want to delete this Admin ?');" action="{{route('users.destroy', $User->id)}}" method="post">
                  @method('DELETE')
                  @csrf
                  <button type="submit"  class="DeleteB">Delete</button>
                 </form></td>
                 @else
                 <td><form class="butnMargin" onclick="return confirm(' ARE YOU SURE YOU WANT TO DELETE YOUR SELF(You will be signed out)');" action="{{route('users.destroy', $User->id)}}" method="post">
                  @method('DELETE')
                  @csrf
                  <button type="submit"  class="DeleteB">Delete</button>
                 </form></td>
                 @endif
                 {{-- <td><form class="butnMargin" action="{{route('users.update', $User->id)}}" method="post">
                  @method('PUT')
                  @csrf
                  <button type="submit" class="makeAdmin">Remove Admin</button> --}}
                 </form></td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@endsection 

@section('script')

<script>
</script>

@endsection 