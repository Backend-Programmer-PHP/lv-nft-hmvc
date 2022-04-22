@extends('back_end::layout')
@section('title', $row->title)
@section('content')
<form method="post" enctype="multipart/form-data">
    @include('back_end::inc.formheader')
    @include("back_end::inc.message")
    <div class="row">
        <!--div class="col-md-5">
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
        </div-->
        <div class="col-md-12">
            <div class="card-box">
                <h5 class="mb-3 mt-0 text-uppercase bg-light p-2"><i class="mdi mdi-square-edit-outline"></i> Thông tin website</h5>
                <p>Ví dụ chuỗi json: {"width":200,"height":200}</p>
                <div class="form-group mb-3">
                    <label>Thumb size - Sản phẩm</label>
                    <input type="text"  name="thumb_product" value="{{$settings['THUMB_SIZE_PRODUCT']}}" class="form-control" placeholder="JSON witdth, height">
                </div>
                <div class="form-group mb-3">
                    <label>Thumb size - Chuyên mục - sản phẩm</label>
                    <input type="text"  name="thumb_product_category" value="{{$settings['THUMB_SIZE_PRODUCT_CATEGORY']}}" class="form-control" placeholder="JSON witdth, height">
                </div>
                <div class="form-group mb-3">
                    <label>Thumb size - Blog</label>
                    <input type="text"  name="thumb_blog" value="{{$settings['THUMB_SIZE_BLOG']}}" class="form-control" placeholder="JSON witdth, height">
                </div>
                <div class="form-group mb-3">
                    <label>Thumb size - Chuyên mục - Blog</label>
                    <input type="text"  name="thumb_blog_category" value="{{$settings['THUMB_SIZE_BLOG_CATEGORY']}}" class="form-control" placeholder="JSON witdth, height">
                </div>
                <div class="form-group mb-3">
                    <label>Thumb size - Slide</label>
                    <input type="text"  name="thumb_slide" value="{{$settings['THUMB_SIZE_SLIDE']}}" class="form-control" placeholder="JSON witdth, height">
                </div>
                <div class="form-group mb-3">
                    <label>Thumb size - Quản trị viên</label>
                    <input type="text"  name="thumb_users" value="{{$settings['THUMB_SIZE_USERS']}}" class="form-control" placeholder="JSON witdth, height">
                </div>
                <div class="form-group mb-3">
                    <label>Thumb size - Dịch vụ</label>
                    <input type="text"  name="thumb_service" value="{{$settings['THUMB_SIZE_SERVICE']}}" class="form-control" placeholder="JSON witdth, height">
                </div>
                <div class="form-group mb-3">
                    <label>Thumb size - Dự án</label>
                    <input type="text"  name="thumb_project" value="{{$settings['THUMB_SIZE_PROJECT']}}" class="form-control" placeholder="JSON witdth, height">
                </div>
                <div class="form-group mb-3">
                    <label>Thumb size - Thương hiệu</label>
                    <input type="text"  name="thumb_brand" value="{{$settings['THUMB_SIZE_BRAND']}}" class="form-control" placeholder="JSON witdth, height">
                </div>
            </div>
        </div>
    </div>
    @include('back_end::inc.formfooter')
</form>
@endsection