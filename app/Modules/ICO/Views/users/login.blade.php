@extends('ICO::layoutpage')
@section('title',"Login")
@section('content')
    <div class="col-md-5">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
							<a href="/">
								<img src="/public/ico/assets/images/logo.svg?v=15" alt="" class="logo-page">
                            </a>
                        </div>
                        <h4 class="text-center mb-4">Sign in your account</h4>
                        @include('ICO::inc.successmessage')
                        @include('ICO::inc.errormessage')

                        <form method="post" action="{{route('ico.users.login_post')}}">
                            @csrf
                            <div class="form-group input-group-lg">
                                <label class="mb-1">Email</label>
                                <input type="email" class="form-control" value="{{old('email')}}" required name="email" placeholder="example@mail.com">
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group input-group-lg">
                                <label class="mb-1">Password</label>
                                <input type="password" class="form-control" value="" required name="password">
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox ml-1">
                                        <input type="checkbox" class="custom-control-input" id="basic_checkbox_1"
                                               name="remember">
                                        <label class="custom-control-label" for="basic_checkbox_1">Remember Me</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="/forgot-password.html">Forgot Password?</a>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>Don't have an account? <a class="text-primary" href="/register.html">Sign up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection