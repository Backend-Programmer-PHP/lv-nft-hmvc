@extends('ICO::layout')
@section('title', 'Passport')
@section('content')
    <div class=" form-head d-flex flex-wrap mb-4 align-items-center">
        <h2 class="text-black mr-auto font-w600 mb-3">Verify Account</h2>
    </div>
    <div class="col-xl-6 col-lg-12 col-sm-12">
        @include('ICO::inc.successmessage')
        @include('ICO::inc.errormessage')
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6 col-lg-12 col-sm-12">
                    <div class="card bg-custom border-main">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" required
                                                value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">OTP</label>
                                            <input type="text" class="form-control" name="otp" required
                                                value="{{ old('otp') }}">
                                            @if ($errors->has('otp'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('otp') }}
                                                </div>
                                            @endif
{{--                                            @foreach ($errors->all() as $error)--}}
{{--                                                @if ($error[0] == 3)--}}
{{--                                                    <div class="alert alert-danger">--}}
{{--                                                        <li>{{ substr($error,1) }}</li>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Passport</label>
                                            <input type="file" class="form-control" name="img_passport" required>
                                            @if ($errors->has('img_passport'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('img_passport') }}
                                                </div>
                                            @endif
{{--                                            @foreach ($errors->all() as $error)--}}
{{--                                                @if ($error[0] == 1)--}}
{{--                                                    <div class="alert alert-danger">--}}
{{--                                                        <li>{{ substr($error,1) }}</li>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Image Face</label>
                                            <input type="file" class="form-control" name="img_face" required>
                                             @if ($errors->has('img_face'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('img_face') }}
                                                </div>
                                            @endif
{{--                                            @foreach ($errors->all() as $error)--}}
{{--                                                @if ($error[0] == 1)--}}
{{--                                                    <div class="alert alert-danger">--}}
{{--                                                        <li>{{ substr($error,1) }}</li>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
