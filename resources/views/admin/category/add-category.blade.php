@extends('admin.master')
@section('body')
    <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Add Category</li>
            </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="row col-md-6 offset-md-2">
                    <h2></h2>
                </div>
                @include('message.message')
                <form action="{{ route("admin.category.store")}}" method="post" class="shadow p-5 rounded" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="categoryName" class="col-sm-4 col-form-label">Category Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="category_name" class="form-control" id="categoryName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="categoryImage" class="col-sm-4 col-form-label">Category Image</label>
                        <div class="col-sm-8">
                            <input type="file" name="category_image" class="form-control" id="categoryImage">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label">Select Parent</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="sel1" name="parent_id">
                                    <option value="0">Parent (default)</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                            </select>
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
                            <input type="submit" name="addCategory" value="Add Category" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
