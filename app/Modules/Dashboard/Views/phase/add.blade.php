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
				<div class="form-group mb-2">
                    <label >Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-sm" placeholder="* tiêu đề">
                </div>
                <div class="form-group mb-2">
                    <label >Start Date</label>
                    <input type="text"  name="start_date" value="{{ old('start_date') }}" class="form-control form-control-sm flatpickr_datetime" placeholder="Start date">
                </div>
				<div class="form-group mb-2">
                    <label >End Date</label>
                    <input type="text" name="end_date" value="{{ old('end_date') }}" class="form-control form-control-sm flatpickr_datetime" placeholder="End date">
                </div>
				<div class="form-group mb-2">
                    <label >Token Number</label>
                    <input type="number" name="token_number" value="{{ old('token_number') }}" class="form-control form-control-sm" placeholder="Token number">
                </div>
				<div class="form-group mb-2">
                    <label >Token Remaining</label>
                    <input type="number" name="token_remaining" value="{{ old('token_remaining') }}" class="form-control form-control-sm" placeholder="Token remaining">
                </div>
				<div class="form-group mb-2">
                    <label >Limit buy token</label>
                    <input type="number" name="limit_buy_token" value="{{ old('limit_buy_token') }}" class="form-control form-control-sm" placeholder="Token limit">
                </div>
                <div class="form-group mb-0">
                    <label>Trạng thái</label>
                    <select class="form-control form-control-sm" name="status">
                        <option value="1" {{(old('status')!="" && old('status')==1)? "selected" :"" }}>Kích hoạt</option>
                        <option value="0" {{(old('status')!="" && old('status')==0)? "selected" :"" }}>Khóa</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    @include('Dashboard::inc.formfooter')
</form>
@endsection