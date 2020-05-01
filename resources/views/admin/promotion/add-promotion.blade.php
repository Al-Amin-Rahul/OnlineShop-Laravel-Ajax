@extends("admin.master")

@section("body")

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Promotion</li>
        </ol>

        <!-- Icon Cards-->

        <div class="shadow mb-3">
            <div class="card-header">
                <span class="m-0 font-weight-bold text-primary">Add Promotion</span>
            </div>
            <div class="shadow pt-5">
                <form class="offset-1 col-sm-10" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="promotion_title">Promotion Title:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="promotion_title" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="promotion_location">Promotion Location</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="promotion_location" value="home1" checked>Home 1
                            </label>
                            <label class="radio-inline pl-3">
                                <input type="radio" name="promotion_location" value="home2">Home 2
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="banner">Image: <span class="text-danger">PNG*</span></label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control-file border" name="banner" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="publication_status">Publication Status</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="publication_status" value="1" checked>Yes
                            </label>

                            <label class="radio-inline pl-3">
                                <input type="radio" name="publication_status" value="0">No
                            </label>
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
