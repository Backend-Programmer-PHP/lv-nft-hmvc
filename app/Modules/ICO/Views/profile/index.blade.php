@extends('ICO::layout')
@section('title',"profile")
@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, welcome {{$user->fullname}} back!</h4>
            <p class="mb-0">Your business dashboard template</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
        </ol>
    </div>
</div>
<div class=" form-head d-flex flex-wrap mb-4 align-items-center">
    <h2 class="text-black mr-auto font-w600 mb-3">Profile</h2>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-sm-12">
                <div class="card bg-custom border-main">
                    <div class="card-header border-0 pb-0">
                        <h2 class="card-title">Profile Details</h2>
                    </div>
                    <div class="card-body pb-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <div>
                                    {{--                                        <strong>Google Authenticator (Recommended)</strong>--}}
                                    {{--                                        <p>Protect your account and transactions.</p>--}}
                                </div>
                                <span class="mb-0"><a href="/profile.html">Show</a></span>

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
                        <h2 class="card-title">Profile Details</h2>
                    </div>
                    <div class="card-body pb-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                {{--                                    <span class="mb-0"><a href="/profile-update.html">Update</a></span>--}}
                                <div></div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalLong">
                                    Update
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Profile
                                                    details</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @foreach ($errors->all() as $error)
                                            @if($error)
                                            <div class="alert alert-danger">
                            <li>{{ $error }}</li>
                    </div>
                    @endif
                    @endforeach
                    <div id="notification"></div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{auth()->user()->fullname}}">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close
                        </button>
                        <a href="" class="btn btn-primary" id="btn-update-profile">Save changes</a>
                    </div>
                </div>
            </div>
        </div>
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
                    <h2 class="card-title">Profile Details</h2>
                </div>
                <div class="card-body pb-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex px-0 justify-content-between">
                                    <span class="mb-0"><a
                                                href="/register-{{auth('web')->user()->referral_code}}.html">Share link register</a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection