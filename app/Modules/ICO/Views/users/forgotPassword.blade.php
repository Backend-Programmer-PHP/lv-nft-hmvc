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
                                <img src="/public/ico/assets/images/logo.svg?V=4" alt="" class="logo-page">
                            </a>
                        </div>
                        <h4 class="text-center mb-4">Forgot Password</h4>
                        <form action="{{route('ico.users.forgotPassword_post')}}" method="post">
                            @csrf
                            <div class="form-group input-group-lg">
                                <label><strong>Email</strong></label>
                                <input type="email" class="form-control" name="email" placeholder="example@mail.com">
                                @foreach ($errors->all() as $error)
                                    @if($error)
                                        <div class="alert alert-danger">
                                            <li>{{ $error }}</li>
                                        </div>
                                    @endif
                                @endforeach
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