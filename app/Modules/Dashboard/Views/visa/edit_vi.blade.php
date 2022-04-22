@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<form method="post" enctype="multipart/form-data">
    @include('Dashboard::inc.formheader')
    @include('Dashboard::inc.message')
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <h4 class="header-title mb-3">{{$row->desc}}</h4>
                <div class="form-group">
                    <div class="form-group">
                    <label for="title">About Us Tiếng việt</label>
                        <textarea name="VISA_CONTENT_VI" class="form-control" rows="20">{{$settings['VISA_CONTENT_VI']}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Dashboard::inc.formfooter')
</form>
@endsection