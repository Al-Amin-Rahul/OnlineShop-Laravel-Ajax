@extends('admin.master')

@section('body')
<div class="container">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Comments</li>
</ol>
@include('message.message')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="m-0 font-weight-bold text-primary">Manage Comments</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-primary text-white">
            <tr>
              <th>No</th>
              <th>Product Id</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Comment</th>
              <th>Star</th>
              <th>Reply</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Product Id</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Comment</th>
              <th>Star</th>
              <th>Reply</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->product_id }}</td>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->phone }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->rating }}</td>
                    <td>{{ $comment->reply }}</td>
                    <td>
                      <a href="{{ route("admin.comment.edit", ["comment" => $comment->id ]) }}">Reply</a> <br>
                      <form action="{{route("admin.comment.destroy",['comment' => $comment->id])}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn-circle btn-danger" type="submit" onclick="return confirm('Are your sure')"><span class="fa fa-trash"></span></button>
                    </form>
                    </td>
                </tr>
                @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection