@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<form method="post" enctype="multipart/form-data">
    @include('Dashboard::inc.formheader')
    @include('Dashboard::inc.message')
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <h4 class="header-title mb-3">Thay đổi mật khẩu</h4>
                <div class="form-group mb-2">
                    <label>Old Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control form-control-sm" placeholder="* Mật khẩu cũ">
                </div>
                <div class="form-group mb-2">
                    <label>New Password</label>
                    <input type="password" name="new_password" value="{{ old('new_password') }}" class="form-control form-control-sm" placeholder="* mật khẩu mới">
                </div>
                <div class="form-group mb-0">
                    <label>Confirm New Password</label>
                    <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control form-control-sm" placeholder="* nhập lại mật khẩu">
                </div>
            </div>
        </div>
    </div>
    @include('Dashboard::inc.formfooter')
</form>
@endsection