@extends('admin.master')

@section('body')
<div class="container">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Product</li>
</ol>
@include('message.message')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="m-0 font-weight-bold text-primary">Manage Products</h6>
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
              <th>Category</th>
              <th>Code</th>
              <th>Stock</th>
              <th>Price</th>
              <th>3</th>
              <th>6</th>
              <th>12</th>
              <th>25</th>
              <th>Top Sale</th>
              <th>Flash Sale</th>
              <th>Flash Sale Ratio</th>
              <th>Occational Sale</th>
              <th>Occational Sale Ratio</th>
              <th>Daily Offer</th>
              <th>Daily Offer Ratio</th>
              <th>Publication Status</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Category</th>
              <th>Code</th>
              <th>Stock</th>
              <th>Price</th>
              <th>3</th>
              <th>6</th>
              <th>12</th>
              <th>25</th>
              <th>Top Sale</th>
              <th>Flash Sale</th>
              <th>Flash Sale Ratio</th>
              <th>Occational Sale</th>
              <th>Occational Sale Ratio</th>
              <th>Daily Offer</th>
              <th>Daily Offer Ratio</th>
              <th>Publication Status</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          @php($i=1)
          @foreach($products as $product)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->category_id }}</td>
              <td>{{ $product->code }}</td>
              <td>{{ $product->stock }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->price_3 }}</td>
              <td>{{ $product->price_6 }}</td>
              <td>{{ $product->price_12 }}</td>
              <td>{{ $product->price_25 }}</td>
              <td>{{ $product->top_sale }}</td>
              <td>{{ $product->flash_sale }}</td>
              <td>{{ $product->flash_sale_ratio }}</td>
              <td>{{ $product->occational_offer }}</td>
              <td>{{ $product->occational_offer_ratio }}</td>
              <td>{{ $product->daily_offer }}</td>
              <td>{{ $product->daily_offer_ratio }}</td>
              <td>{{ $product->publication_status }}</td>
              <td><img src="{{ asset($product->image) }}" width="100" alt=""></td>
              <td>
                  <a href="{{route("admin.product.edit", ['product' =>  $product->id])}}" class="btn-circle btn-primary"><i class="fas fa-plus"></i></a>
                  <!-- <a href="{{route("admin.product.destroy", ['product'  =>  $product->id])}}" onClick="Are You Sure ?" class="btn-circle btn-danger"><i class="fas fa-trash"></i></a> -->
                  <form action="{{route("admin.product.destroy", ['product'  =>  $product->id])}}" method="post">
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