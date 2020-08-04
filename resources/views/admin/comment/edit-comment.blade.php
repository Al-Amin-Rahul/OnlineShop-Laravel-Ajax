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
<div class="row">
            <div class="col-md-12">
                <div class="row col-md-6 offset-md-2">
                    <h2></h2>
                </div>
                @include('message.message')
                <form action="{{ route("admin.comment.update",['comment' => $comment->id])}}" method="post" class="shadow p-5 rounded" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <span>Id : {{$comment->id}}</span><br>
                    <span>Name : {{$comment->name}}</span><br>
                    <span>Comment : {{$comment->comment}}</span><br>
                    <div class="form-group row">
                        <label for="categoryName" class="col-sm-4 col-form-label">Comment Reply</label>
                        <div class="col-sm-8">
                            <input type="text" name="reply" class="form-control"  value="{{$comment->reply}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 offset-md-8 text-right">
                            <input type="submit" name="updateComment" value="Update Comment" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection