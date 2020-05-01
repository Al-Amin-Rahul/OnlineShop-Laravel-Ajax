@extends('admin.master')
@section('body')
    <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Add Slider Image</li>
            </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="row col-md-6 offset-md-2">
                    <h2></h2>
                </div>
                @include('message.message')
                <form action="{{route('admin.slider.store')}}" method="post" class="shadow p-5 rounded" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="sliderTitle">Title</label>
                        <input type="text" name="title" class="form-control col-sm-8" id="sliderTitle">
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="shortDescription">Short Description</label>
                        <textarea name="short_description" id="shortDescription"  rows="3" class="form-control col-sm-8"></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="sliderImage">Slider Image</label>
                        <input type="file" name="slider_image" class="form-control col-sm-8" id="sliderImage">
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="location">Select Location</label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                                <input type="radio" name="location" value="home" checked>Home Page
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="location" value="category">Category Page
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="active">Select Active Class</label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                                <input type="radio" name="active" value="active">Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0" checked>Null <span class="text-danger pl-3">Only Active For One Slider Image in Each Page*</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="publication_status">Publication Status</label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                                <input type="radio" name="publication_status" value="1" checked>Published
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="publication_status" value="0">Unpublished
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 offset-md-8 text-right">
                            <input type="submit" name="addSlider" value="Add Slider Image" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
