@extends('ICO::layoutpage')
@section('title',"Forgot Password")
@section('content')
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
						<div class="text-left mb-0">
							<a href="/" style="font-size:26px">
								<span class="ti-arrow-circle-left"></span>
							</a>
						</div>
                        <div class="text-center mb-4">
                            <a href="/">
                                <img src="/public/ico/assets/images/logo.svg" alt="" class="logo-page">
                            </a>
                        </div>
                        <h4 class="text-center mb-4">Forgot Password</h4>
                        @include('ICO::inc.successmessage')
                        @include('ICO::inc.errormessage')
                        <form method="post">
                            @csrf
                            <div class="form-group input-group-lg">
                                <label><strong>Password</strong></label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group input-group-lg">
                                <label><strong>Password Confirmed</strong></label>
                                <input type="password" class="form-control" name="password_confirm">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
