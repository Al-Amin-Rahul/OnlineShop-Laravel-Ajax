@extends("admin.master")

@section("body")

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Coupon</li>
        </ol>

        <!-- Icon Cards-->

        <div class="shadow mb-3">
            <div class="card-header">
                <span class="m-0 font-weight-bold text-primary">Add Coupon</span>
            </div>
            @include('message.message')
            <div class="shadow pt-5">
                <form class="offset-1 col-sm-10" action="{{ route("admin.coupon.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="coupon_code" class="col-sm-4 col-form-label">Coupon Code</label>
                        <div class="col-sm-8">
                            <input type="text" name="coupon_code" id="coupon_code" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="discount" class="col-sm-4 col-form-label">Discount</label>
                        <div class="col-sm-8">
                            <input type="number" name="discount" id="discount" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expire_date" class="col-sm-4 col-form-label">Expire Date</label>
                        <div class="col-sm-8">
                            <input type="date" name="expire_date" id="expire_date">
                        </div>
                    </div>
                    <div class="form-group row pb-5">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info btn-block">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
