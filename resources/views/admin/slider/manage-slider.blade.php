@extends('admin.master')

@section('body')
<div class="container">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Slider</li>
</ol>
@include('message.message')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="m-0 font-weight-bold text-primary">Manage Slider</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-primary text-white">
            <tr>
              <th>No</th>
              <th>Slider Title</th>
              <th>Short Description</th>
              <th>Image</th>
              <th>Location</th>
              <th>Active</th>
              <th>Publication Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Slider Title</th>
              <th>Short Description</th>
              <th>Image</th>
              <th>Location</th>
              <th>Active</th>
              <th>Publication Status</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          @php($i=0)
          @foreach($sliders as $slider)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $slider->title }}</td>
              <td>{{ $slider->short_description }}</td>
              <td><img src="{{asset($slider->slider_image)}}" height="100"/></td>
              <td>{{ $slider->location }}</td>
              <td>{{ $slider->active }}</td>
              <td>{{ $slider->publication_status }}</td>
              <td>
                  <a href="{{route("admin.slider.edit", ['slider' =>  $slider->id])}}" class="btn-circle btn-primary"><i class="fas fa-edit"></i></a></br></br>
                  <form action="{{route("admin.slider.destroy", ['slider' =>  $slider->id])}}" method="post">
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