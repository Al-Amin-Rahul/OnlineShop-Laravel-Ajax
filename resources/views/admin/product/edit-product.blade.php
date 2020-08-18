@extends("admin.master")

@section("body")

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Product</li>
        </ol>

        <!-- Icon Cards-->
        @include('message.message')
        <div class="shadow mb-3">
            <div class="card-header">
                <span class="m-0 font-weight-bold text-primary">Edit Product</span>
            </div>
            <div class="shadow pt-5">
                <form class="offset-1 col-sm-10" action="{{route("admin.product.update", ['product' =>  $product->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="name">Product Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}" id="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="category">Product Category:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="category" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$pid == $category->id ? 'selected':''}}>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- perfume -->
                    <div class="bg-dark text-white mb-3 p-3" id="pbox">
                        <div class="alert alert-danger">
                            Perfume Price
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Price 3ml:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="price_3" value="{{ $product->price_3 }}" id="price3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Price 6ml:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="price_6" value="{{ $product->price_6 }}" id="price6">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Price 12ml:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="price_12" value="{{ $product->price_12 }}" id="price8">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Price 25ml:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="price_25" value="{{ $product->price_25 }}" id="price10">
                            </div>
                        </div>
                    </div>
                    <!-- perfume -->

                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="code">Product Code:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="code" value="{{ $product->code }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="stock">Product Stock:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="stock" value="{{ $product->stock }}" id="stock">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="price">Product Price:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="price" value="{{ $product->price }}" id="price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="description">Description:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" rows="4" id="description">{{ $product->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="product_feature">Product Feature</label>
                        <div class="col-sm-9">
                            <textarea id="editor" class="form-control" name="product_feature" rows="4" id="product_feature">{{ $product->product_feature }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="top_sale">Top Sale</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="top_sale" value="1" {{$product->top_sale == 1 ? 'checked':''}}>Yes
                            </label>

                            <label class="radio-inline pl-3">
                                <input type="radio" name="top_sale" value="0" {{$product->top_sale == 0 ? 'checked':''}}>No
                            </label>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="flash_sale">Flash Sale</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="flash_sale" value="1" {{$product->flash_sale == 1 ? 'checked':''}}>Yes
                            </label>

                            <label class="radio-inline pl-3">
                                <input type="radio" name="flash_sale" value="0" {{$product->flash_sale == 0 ? 'checked':''}}>No
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="flash_sale_ratio">Flash Sale Ratio</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="flash_sale_ratio" id="flash_sale_ratio" value="{{ $product->flash_sale_ratio }}" id="flash_sale_ratio">
                        </div>
                    </div>
                    <hr class=""/>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="occational_offer">Occational Offer</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="occational_offer" value="1" {{$product->occational_offer == 1 ? 'checked':''}}>Yes
                            </label>

                            <label class="radio-inline pl-3">
                                <input type="radio" name="occational_offer" value="0" {{$product->occational_offer == 0 ? 'checked':''}}>No
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="occational_offer_ratio">Occational Offer Ratio</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="occational_offer_ratio" value="{{ $product->occational_offer_ratio }}" id="occational_offer_ratio">
                        </div>
                    </div>
                    <hr class=""/>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="daily_offer">Daily Offer</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="daily_offer" value="1" {{$product->daily_offer == 1 ? 'checked':''}}>Yes
                            </label>

                            <label class="radio-inline pl-3">
                                <input type="radio" name="daily_offer" value="0" {{$product->daily_offer == 0 ? 'checked':''}}>No
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="daily_offer_ratio">Daily Offer Ratio:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="daily_offer_ratio" value="{{ $product->daily_offer_ratio }}" id="daily_offer_ratio">
                        </div>
                    </div>
                    <hr class=""/>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="mela">Mela</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="mela" value="1" {{$product->mela == 1 ? 'checked':''}}>Yes
                            </label>

                            <label class="radio-inline pl-3">
                                <input type="radio" name="mela" value="0" {{$product->mela == 0 ? 'checked':''}}>No
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="mela_offer_ratio">Mela Offer Ratio:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="mela_offer_ratio" value="{{ $product->mela_offer_ratio }}" id="mela_offer_ratio">
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


                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="image">Image:</label>
                        <div class="col-sm-3"><img src="{{ asset($product->image) }}" width="150" class="img-thumbnail" alt=""></div>
                        <div class="col-sm-6">
                            <input type="file" class="form-control-file border" name="image" accept="image/*" id="image">
                        </div>
                    </div>

                    <div class="form-group row pb-5">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info btn-block">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection
