@extends('admin.master')
@section('body')
    <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Edit Slider Image</li>
            </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="row col-md-6 offset-md-2">
                    <h2></h2>
                </div>
                @include('message.message')
                <form action="{{route("admin.slider.update", ['slider'  => $slider->id])}}" method="post" class="shadow p-5 rounded" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="sliderTitle">Title</label>
                        <input type="text" name="title" class="form-control col-sm-8" id="sliderTitle" value="{{$slider->title}}">
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="shortDescription">Short Description</label>
                        <textarea name="short_description" id="shortDescription"  rows="3" class="form-control col-sm-8">{{$slider->short_description}}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="sliderImage">Slider Image</label>
                        <img src="{{asset($slider->slider_image)}}" width="80" alt="">
                        <input type="file" name="slider_image" class="form-control col-sm-6" id="sliderImage">
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="location">Select Location</label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                                <input type="radio" name="location" value="home" {{$slider->location == 'home' ? 'checked' : ''}}>Home Page
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="location" value="category" {{$slider->location == 'category' ? 'checked' : ''}}>Category Page
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="active">Select Active Class</label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                                <input type="radio" name="active" value="active" {{$slider->active == 'active' ? 'checked' : ''}}>Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0" {{$slider->active == '0' ? 'checked' : ''}}>Null <span class="text-danger pl-3">Only Active For One Slider Image in Each Page*</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="publication_status">Publication Status</label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                                <input type="radio" name="publication_status" value="1" {{$slider->publication_status == 1 ? 'checked' : ''}}>Published
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="publication_status" value="0" {{$slider->publication_status == 0 ? 'checked' : ''}}>Unpublished
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 offset-md-8 text-right">
                            <input type="submit" name="update_slider" value="Update Slider Image" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
