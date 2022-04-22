@extends('ICO::layout')
@section('title', 'KYC')
@section('content')
    <div class=" form-head d-flex flex-wrap mb-4 align-items-center">
        <h2 class="text-black mr-auto font-w600 mb-3">KYC</h2>
    </div>
    @if (session('success'))
        <div class="alert alert-success col-xl-6 col-lg-12 col-sm-12">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-xl-6 col-lg-12 col-sm-12">
        @include('ICO::inc.successmessage')
        @include('ICO::inc.errormessage')
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6 col-lg-12 col-sm-12">
                    <div class="card bg-custom border-main">
                        <div class="card-header border-0 pb-0">
                            <h2 class="card-title">Verify Email</h2>
                        </div>
                        <div class="card-body pb-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <div>
                                        <strong>Please enter your email</strong>

                                        <form action="{{ route('ico.kyc.index_post') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="email" name="email_otp">
                                            <button class="btn btn-primary" type="submit">Send</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6 col-lg-12 col-sm-12">
                    <div class="card bg-custom border-main">
                        <div class="card-header border-0 pb-0">
                            <h2 class="card-title">Verify Account</h2>
                        </div>
                        <div class="card-body pb-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <div>
                                        <strong>Please choose one of the 3 authentication methods</strong>
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="/identity-card.html">Identity Card</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/passport.html">Passport</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/driver-license.html">Driving License</a>
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- @if (!$user->google2fa_enable)
                                <span class="mb-0"><a href="./2fa.html">Enable</a></span>
                                @else
                                <span class="mb-0"><a href="./2fa.html">Disable</a></span>
                                @endif --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
