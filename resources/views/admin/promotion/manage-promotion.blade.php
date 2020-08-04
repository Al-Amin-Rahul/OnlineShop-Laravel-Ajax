@extends('admin.master')

@section('body')
<div class="container">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Daily Offer</li>
</ol>
@include('message.message')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="m-0 font-weight-bold text-primary">Manage Daily Offer</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-primary text-white">
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Publication Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Publication Status</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <tr>
                <td>{{ $dailyOffer->id }}</td>
                <td>{{ $dailyOffer->promotion_title }}</td>
                <td>{{ $dailyOffer->publication_status }}</td>
                <td>
                <a href="{{route("admin.promotion.edit", ['promotion' =>  $dailyOffer->id])}}" class="btn-circle btn-primary"><i class="fas fa-plus"></i></a>
                </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection