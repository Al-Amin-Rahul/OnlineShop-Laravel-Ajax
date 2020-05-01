@extends('front.master')

@section('body')
<section class="py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 p-5 bg-gray shadow">
                <div class="wrapper shadow rounded p-5 bg-warning">
                    <div class="form-group">
                        <input type="number" name="phone" placeholder="Phone Number" class="form-control input-d-1">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control input-d-1">
                    </div>
                    <input type="submit" name="submit" value="Login" class="btn btn-success btn-block">
                    <span>Don't Have An Account ? <a href="" class="text-danger">Create Account <i class="fas fa-user-plus"></i></a></span>
                    <div class="input-group pt-3">
                        <button class="btn btn-primary btn-block"><i class="fab fa-facebook"></i> Login With Facebook</button>
                        <button class="btn btn-danger btn-block"><i class="fab fa-google"></i> Login With Google</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
