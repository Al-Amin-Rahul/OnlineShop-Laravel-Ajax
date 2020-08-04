@extends('admin.master')

@section('body')
<div class="container">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Order</li>
</ol>
@include('message.message')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="m-0 font-weight-bold text-primary">Manage Orders</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-primary text-white">
            <tr>
              <th>No</th>
              <th>Order No</th>
              <th>Customer Name</th>
              <th>Phone</th>
              <th>Payment Status</th>
              <th>Order Status</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Order No</th>
              <th>Customer Name</th>
              <th>Phone</th>
              <th>Payment Status</th>
              <th>Order Status</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          @php( $i = 0 )
          @foreach( $shippings as $shipping)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $shipping->id }}</td>
              <td>{{ $shipping->name }}</td>
              <td>{{ $shipping->phone }}</td>
              <td>
              <form action="{{ route("admin.users.update", ["user" => $shipping->id]) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option selected>{{ $shipping->status }}</option>
                            <option value="Pending">Pending</option>
                            <option value="Success">Success</option>
                        </select>
                    </div>
                    <input class="btn btn-primary btn-sm btn-block" type="submit" name="update" value="Update" >
                </form>
              </td>
              <td>
                <form action="{{ route("admin.order.update", ["order" => $shipping->id]) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <select class="form-control" name="order_status">
                            <option selected>{{ $shipping->order_status }}</option>
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Success">Success</option>
                            <option value="Cancel">Cancel</option>
                        </select>
                    </div>
                    <input class="btn btn-primary btn-sm btn-block" type="submit" name="update" value="Update" >
                </form>
              </td>
              
              <td>{{ $shipping->created_at }}</td>
              <td>
                <a href="{{ route("admin.order.show", ["order" => $shipping->id ]) }}" class="btn btn-primary btn-sm" title="View details">
                    <span class="fa fa-info-circle"></span>
                </a>

                <form  class="float-right" action="{{ route("admin.order.destroy", ["order" => $shipping->id ]) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are your sure')"><span class="fa fa-trash"></span></button>
                </form>
              </td>
              @endforeach
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection