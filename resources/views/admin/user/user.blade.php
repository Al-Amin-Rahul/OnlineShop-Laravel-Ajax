@extends('admin.master')

@section('body')
<div class="container">
<div class="shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
            </div>
            <div class="col-lg-6 text-right">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addUser"><i class="fas fa-plus"></i> Add User</a>
            </div>
        </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->password}}</td>
              <td>
                  <a href="" class="btn-circle btn-primary"><i class="fas fa-plus"></i></a>
                  <a href="" class="btn-circle btn-danger"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  <!-- add user modal  -->
  <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
            </div>
            <input type="text" name="name" class="form-control" placeholder="Name" required/>
          </div>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Name" required/>
          </div>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-mobile"></i></div>
            </div>
            <input type="number" name="phone" class="form-control" placeholder="Name" required/>
          </div>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-key"></i></div>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Name" required/>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" class="form-control btn-success" value="Add User" required/>
        </div>
      </div>
    </div>
  </div>
@endsection