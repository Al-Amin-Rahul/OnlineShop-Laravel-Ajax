@extends('admin.master')

@section('body')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Daily Offer</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="row col-md-6 offset-md-2">
                    <h2></h2>
                </div>
                @include('message.message')
                <form action="{{ route("admin.promotion.update",['promotion' => $dailyOffer->id])}}" method="post" class="shadow p-5 rounded" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group row">
                        <label for="categoryName" class="col-sm-4 col-form-label">Daily Offer Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="promotion_title" class="form-control" value="{{$dailyOffer->promotion_title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="publication_status">Publication Status</label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                                <input type="radio" name="publication_status" value="1" {{$dailyOffer->publication_status==1?'checked':''}}>Published
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="publication_status" value="0" {{$dailyOffer->publication_status==0?'checked':''}}>Unpublished
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 offset-md-8 text-right">
                            <input type="submit" name="update" value="Update" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection