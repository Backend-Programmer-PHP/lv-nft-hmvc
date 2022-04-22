@extends('ICO::layout')
@section('title',"Security")
@section('content')
<!--div class=" form-head d-flex flex-wrap mb-4 align-items-center">
        <h2 class="text-black mr-auto font-w600 mb-3">Two-Factor Authentication (2FA)</h2>
    </div-->
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-sm-12">
                <div class="card-common">
                    <p class="title-main">Two-Factor Authentication (2FA)</p>
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if(!$user->google2fa_enable)
                    <strong>1. Scan this barcode with your Google Authenticator App:</strong><br /><br />
                    <img src="{{$google2fa_url }}" alt="">
                    <br /><br />
                    <label for="verify-code" class="control-label">Secret Key</label>
                    <div class="mb-3">
                        <input value="{{$secret}}" type="text" class="form-control" disabled>
                    </div>
                    <strong>2.Enter the pin the code to Enable 2FA</strong><br /><br />
                    <form class="form-horizontal" method="POST" action="{{ route('ico.security.2fa.enable') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">

                            <label for="verify-code" class="control-label">Authenticator Code</label>
                            <div class="">
                                <input id="verify-code" type="text" class="form-control" name="verify-code"
                                        required>

                                @if ($errors->has('verify-code'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('verify-code') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enable 2FA
                                </button>
                            </div>
                        </div>
                    </form>
                    @else()
                    <div class="alert alert-success">
                        2FA is Currently <strong>Enabled</strong> for your account.
                    </div>
                    <p>If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.</p>
                    <form class="form-horizontal col-md-6 pl-0" method="POST" action="{{ route('ico.security.2fa.disable2fa') }}">
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="change-password" class="control-label">Current Password</label>

                            <div class="">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current-password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-offset-5">

                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary ">Disable 2FA</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection