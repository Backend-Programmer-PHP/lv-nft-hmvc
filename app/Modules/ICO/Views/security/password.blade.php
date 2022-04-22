@extends('ICO::layout')
@section('title',"Security-Password")
@section('content')
@include('ICO::inc.successmessage')
<div class="row">
    <div class="col-md-5">
        <div class="card-common">
            <form method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Old Password</label>
                    <input type="password" class="form-control" name="old_password" required value="{{old('old_password')}}">
                    @if ($errors->has('old_password'))
                    <div class="alert alert-danger">
                        {{ $errors->first('old_password') }}
                    </div>
                    @endif
                    @foreach ($errors->all() as $error)
                    @if($error[0] == 0)
                    <div class="alert alert-danger">
                        <li>{{ substr($error,1) }}</li>
                    </div>
                    @endif
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" name="new_password" required value="{{old('new_password')}}">
                    @if ($errors->has('new_password'))
                    <div class="alert alert-danger">
                        {{ $errors->first('new_password') }}
                    </div>
                    @endif
                    @foreach ($errors->all() as $error)
                    @if($error[0] == 3)
                    <div class="alert alert-danger">
                        <li>{{ substr($error,1) }}</li>
                    </div>
                    @endif
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password confirmed</label>
                    <input type="password" class="form-control" name="password_confirm" value="{{old('password_confirm')}}" required>
                    @if ($errors->has('password_confirm'))
                    <div class="alert alert-danger">
                        {{ $errors->first('password_confirm') }}
                    </div>
                    @endif
                    @foreach ($errors->all() as $error)
                    @if($error[0] == 1)
                    <div class="alert alert-danger">
                        <li>{{ substr($error,1) }}</li>
                    </div>
                    @endif
                    @endforeach
                </div>
                @if($user->google2fa_enable)
                <div class="form-group">
                    <label for="exampleInputPassword1">Google verification code</label>
                    <input type="text" class="form-control" name="google_verification" required>
                </div>
                @endif
                @if ($errors->has('google_verification'))
                <div class="alert alert-danger">
                    {{ $errors->first('google_verification') }}
                </div>
                @endif
                @foreach ($errors->all() as $error)
                @if($error[0] == 2)
                <div class="alert alert-danger">
                    <li>{{ substr($error,1) }}</li>
                </div>
                @endif
                @endforeach
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection