@extends('ICO::layoutpage')
@section('title',"Security verification")
@section('content')
    <div class="col-md-5">
        <div class="authincation-content form2fa">
            <div class="row no-gutters border-main">
                <div class="card">
                    <div class="card-header">
                        <span class="text-white">Two-factor authentication</span>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form role="form" method="post" action="{{ route('ico.security.twoFace.verify') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label" for="otp">
                                    <b>Authentication code</b>
                                </label>
                                <input type="text" name="code" class="form-control" autocomplete="off" maxlength="6"
                                       id="otp">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary col-md-12">Verify</button>
                            </div>
                            <p class="text-muted">
                                Open the two-factor authentication app on your device to view your authentication code
                                and verify
                                your identity.
                            </p>
                        </form>
                            <div class="new-account mt-3">
                                <p class="text-muted">If you forget Authentication code? <a class="text-primary" href="/logout.html">Logout</a>
                                </p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection