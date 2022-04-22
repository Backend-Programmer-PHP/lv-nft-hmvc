@extends('back_end::layout')
@section('title', $row->title)
@section('content')
<form method="post" enctype="multipart/form-data">
    @include('back_end::inc.formheader')
    @include("back_end::inc.message")
    <div class="row">
        <div class="col-md-5">
            <div class="card-box">
                <h5 class="mb-3 mt-0 text-uppercase bg-light p-2"><i class="mdi mdi-eye-check"></i> review</h5>
                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13"><strong><i class="ti-facebook"></i> :</strong> <span class="ml-2"><a href="{{$settings['LINK_FACEBOOK']}}">{{$settings['LINK_FACEBOOK']}}</a></span></p>
                    <p class="text-muted mb-2 font-13"><strong><i class="fab fa-youtube"></i> :</strong> <span class="ml-2"><a href="{{$settings['LINK_YOUTUBE']}}">{{$settings['LINK_YOUTUBE']}}</a></span></p>
                    <p class="text-muted mb-2 font-13"><strong><i class="ti-skype"></i> :</strong> <span class="ml-2"><a href="{{$settings['LINK_SKYPE']}}">{{$settings['LINK_SKYPE']}}</a></span></p>
                    <p class="text-muted mb-2 font-13"><strong><i class="ti-twitter-alt"></i> :</strong> <span class="ml-2"><a href="{{$settings['LINK_TWITTER']}}">{{$settings['LINK_TWITTER']}}</a></span></p>
                    <p class="text-muted mb-2 font-13"><strong><i class="ti-linkedin"></i> :</strong> <span class="ml-2"><a href="{{$settings['LINK_LINKEDIN']}}">{{$settings['LINK_LINKEDIN']}}</a></span></p>
                    <p class="text-muted mb-2 font-13"><strong><i class="ti-instagram"></i> :</strong> <span class="ml-2"><a href="{{$settings['LINK_INSTAGRAM']}}">{{$settings['LINK_INSTAGRAM']}}</a></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card-box">
                <h5 class="mb-3 mt-0 text-uppercase bg-light p-2"><i class="mdi mdi-square-edit-outline"></i> Link mạng xã hội</h5>
                <div class="form-group mb-3">
                    <label for="LINK_FACEBOOK"><i class="ti-facebook"></i> Facebook link</label>
                    <input type="text" id="LINK_FACEBOOK" name="LINK_FACEBOOK" value="{{$settings['LINK_FACEBOOK']}}" class="form-control" placeholder="http://facebook.com">
                </div>
                <div class="form-group mb-3">
                    <label for="LINK_INSTAGRAM"><i class="ti-instagram"></i> Instagram link</label>
                    <input type="text" id="LINK_INSTAGRAM" name="LINK_INSTAGRAM" value="{{$settings['LINK_INSTAGRAM']}}" class="form-control" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label for="LINK_LINKEDIN"><i class="ti-linkedin"></i> Linkedin link</label>
                    <input type="text" id="LINK_LINKEDIN" name="LINK_LINKEDIN" value="{{$settings['LINK_LINKEDIN']}}" class="form-control" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label for="LINK_TWITTER"><i class="ti-twitter-alt"></i> Twitter link</label>
                    <input type="text" id="LINK_TWITTER" name="LINK_TWITTER" value="{{$settings['LINK_TWITTER']}}" class="form-control" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label for="LINK_YOUTUBE"><i class="fab fa-youtube"></i> Youtube link</label>
                    <input type="text" id="LINK_TWITTER" name="LINK_YOUTUBE" value="{{$settings['LINK_YOUTUBE']}}" class="form-control" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label for="LINK_SKYPE"><i class="ti-skype"></i> Skype link</label>
                    <input type="text" id="LINK_TWITTER" name="LINK_SKYPE" value="{{$settings['LINK_SKYPE']}}" class="form-control" placeholder="">
                </div>
            </div>
        </div>
    </div>
    @include('back_end::inc.formfooter')
</form>
@endsection