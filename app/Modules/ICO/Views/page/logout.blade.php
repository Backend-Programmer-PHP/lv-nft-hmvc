@extends('ICO::layoutpage')
@section('title',"Error")
@section('content')
    <div class="col-md-8">
        <div class="form-input-content text-center error-page">
            <p class="font-weight-bold text-white" style="margin-bottom:0;font-size:50px">403</p>
            <p style="color:#fff"><i class="fa fa-exclamation-triangle"></i>There is already 1 other device accessing with this account.</p>
            <div class="mt-4">
                <a class="btn btn-primary" href="/login.html">Login</a>
            </div>
        </div>
    </div>
@endsection