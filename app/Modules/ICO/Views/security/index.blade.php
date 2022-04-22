@extends('ICO::layout')
@section('title',"Security")
@section('content')
<div class=" form-head d-flex flex-wrap mb-4 align-items-center">
    <h2 class="text-black mr-auto font-w600 mb-3">Security</h2>
</div>
@if (session('success'))
<div class="alert alert-success col-md-4">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-sm-12">
                <div class="card bg-custom border-main">
                    <div class="card-header border-0 pb-0">
                        <h2 class="card-title">Two-Factor Authentication (2FA)</h2>
                    </div>
                    <div class="card-body pb-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <div>
                                    <strong>Google Authenticator (Recommended)</strong>
                                    <p>Protect your account and transactions.</p>
                                </div>
                                @if(!$user->google2fa_enable)
                                <span class="mb-0"><a href="./2fa.html">Enable</a></span>
                                @else
                                <span class="mb-0"><a href="./2fa.html">Disable</a></span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-sm-12">
                <div class="card bg-custom border-main">
                    <div class="card-header border-0 pb-0">
                        <h2 class="card-title">Advanced Security</h2>
                    </div>
                    <div class="card-body pb-0">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <div>
                                    <strong>Login Password</strong>
                                    <p>Login password is used to log in to your account.</p>
                                </div>
                                <span class="mb-0"><a href="./change-password.html">Changes</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-sm-12">
                <div class="card bg-custom border-main">
                    <div class="card-header border-0 pb-0">
                        <h2 class="card-title">
                            Identity Verification
                        </h2>
                    </div>
                    <div class="card-body pb-0">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <div>
                                    <strong>E-KYC</strong>
                                    <p>Completing verification helps to protect account security.</p>
                                </div>
                                <span class="mb-0"><a href="https://ekyc.live/?email={{$user->email}}&id={{$user->app_id}}">Not yet</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection