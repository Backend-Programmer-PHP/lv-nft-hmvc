@extends('ICO::layout')
@section('title',"Authentication")
@section('content')
    <div class="col-md-8">
        <div class="form-input-content text-center error-page">
{{--            <h1 class="error-text font-weight-bold">404</h1>--}}
            <h4><i class="fa fa-exclamation-triangle text-warning"></i> The page request to enable 2fa authentication!</h4>
            <p>Please click on the link below to go to the security page.</p>
            <div>
                <a class="btn btn-primary" href="/2fa.html">Security</a>
            </div>
        </div>
    </div>
@endsection