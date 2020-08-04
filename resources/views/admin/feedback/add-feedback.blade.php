@extends('admin.master')

@section('body')
    <section class="pt-5 pb-5">
        <div class="container">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Add Feedback</li>
            </ol>
            <div class="row">
                <div class="col-lg-12">
                    @include('message.message')
                    <form action="{{ route("admin.feedback.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-lg-3 col-form-label">Name</label>
                            <div class="col-sm-9 col-lg-9">
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="work" class="col-sm-3 col-lg-3 col-form-label">Work Title</label>
                            <div class="col-sm-9 col-lg-9">
                                <input type="text" name="work" class="form-control" id="work">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-lg-3 col-form-label">Image</label>
                            <div class="col-sm-9 col-lg-9">
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="feedback" class="col-sm-3 col-lg-3 col-form-label">Feedback</label>
                            <div class="col-sm-9 col-lg-9">
                                <textarea name="feedback" id="feedback" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                        <input type="submit" value="Add Feedback" name="submit" class="form-control btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection