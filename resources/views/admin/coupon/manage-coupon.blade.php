@extends('admin.master')

@section('body')
<div class="container">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Coupon</li>
</ol>
@include('message.message')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="m-0 font-weight-bold text-primary">Manage Coupon</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-primary text-white">
            <tr>
              <th>No</th>
              <th>Coupon Name</th>
              <th>Discount</th>
              <th>Expire Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Coupon Name</th>
              <th>Discount</th>
              <th>Expire Date</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @php($i = 1)
            @foreach($coupons as $coupon)
                <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $coupon->coupon_code }}</td>
                <td>{{ $coupon->discount }}</td>
                <td>{{ $coupon->expire_date }}</td>
                <td>
                    <form action="{{route("admin.coupon.destroy",['coupon' => $coupon->id])}}" method="post">
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