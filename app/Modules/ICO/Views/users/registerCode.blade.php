@extends('ICO::layoutpage')
@section('title',"Register Account")
@section('content')
    <div class="col-md-5">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-4">
                            <a href="/">
                                <img src="/public/ico/assets/images/logo.svg?v=4" alt="" class="logo-page">
                            </a>
                        </div>
                        <h4 class="text-center mb-4">Sign up your account</h4>
                        @foreach ($errors->all() as $error)
                            @if($error)
                                <div class="alert alert-danger">
                                    <li>{{ $error }}</li>
                                </div>
                            @endif
                        @endforeach
                        <form action="" method="post">
                            @csrf
                            <div class="form-group input-group-lg">
                                <label class="mb-1">Email</label>
                                <input type="email" class="form-control" placeholder="example@mail.com" name="email"
                                       required value="{{old('email')}}">
                                {{--                                @if ($errors->has('email'))--}}
                                {{--                                    <div class="alert alert-danger">--}}
                                {{--                                        {{ $errors->first('email') }}--}}
                                {{--                                    </div>--}}
                                {{--                                @endif--}}
                            </div>
                            <div class="form-group input-group-lg">
                                <label class="mb-1">Password</label>
                                <input type="password" class="form-control" name="password" required>
                                {{--                                @if ($errors->has('password'))--}}
                                {{--                                    <div class="alert alert-danger">--}}
                                {{--                                        {{ $errors->first('password') }}--}}
                                {{--                                    </div>--}}
                                {{--                                @endif--}}
                            </div>
                            <div class="form-group input-group-lg">
                                <label class="mb-1">Password Confirm</label>
                                <input type="password" class="form-control" name="password_confirm" required>
                                {{--                                @if ($errors->has('password_confirm'))--}}
                                {{--                                    <div class="alert alert-danger">--}}
                                {{--                                        {{ $errors->first('password_confirm') }}--}}
                                {{--                                    </div>--}}
                                {{--                                @endif--}}
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>Already have an account? <a class="text-primary" href="/login.html">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection