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
                <div class="search-item">
                    @if(!empty($settings['PHOTO_SHARE']))
                    <img width="100%" src="/public/upload/images/facebook/thumb/{{$settings['PHOTO_SHARE']}}" />
                    @endif
                    <h4 class="mb-1"><a href="#">{{$settings['TITLE']}}</a></h4>
                    <div class="font-13 text-success mb-2 text-truncate">
                        {{$settings['LINK_WEBSITE']}}
                    </div>
                    <p class="mb-0 text-muted">
                        {{$settings['META_DESCRIPTION']}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card-box">
                <h5 class="mb-3 mt-0 text-uppercase bg-light p-2"><i class="mdi mdi-square-edit-outline"></i> Thông tin website</h5>
                <div class="form-group mb-3">
                    <label for="title">Website link</label>
                    <input type="text" id="title" name="link_website" value="{{$settings['LINK_WEBSITE']}}" class="form-control" placeholder="http://abc.com">
                </div>
                <div class="form-group mb-3">
                    <label for="title">Tiêu đề website</label>
                    <input type="text" id="title" name="title" value="{{$settings['TITLE']}}" class="form-control" placeholder="Dịch vụ ABC - ..">
                </div>
                <div class="form-group mb-3">
                    <label for="title">Từ khóa website</label>
                    <input type="text" id="title" name="keyword" value="{{$settings['META_KEYWORD']}}" class="form-control" placeholder="Dịch vụ, khuyến mãi,...">
                </div>
                <div class="form-group">
                    <label for="example-textarea">Mô tả website</label>
                    <textarea class="form-control" name="description" id="example-textarea" rows="5">{{$settings['META_DESCRIPTION']}}</textarea>
                </div>
            </div>
            <div class="card-box">
                <h5 class="mb-3 mt-0 text-uppercase bg-light p-2"><i class="mdi mdi-square-edit-outline"></i> hình ảnh share</h5>
                <div class="form-group mb-0">
                    <label>Image [jpg,png] [600x314px]</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" placeholder="Chọn file" id="uploadphoto">
                            <label class="custom-file-label" for="uploadphoto">Chọn file</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('back_end::inc.formfooter')
</form>
@endsection