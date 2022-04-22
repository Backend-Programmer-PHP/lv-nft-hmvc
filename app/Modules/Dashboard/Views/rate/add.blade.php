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
                <div class="form-group mb-2" style="max-width:400px">
                    <label for="title">Phase</label>
                    <select name="phase_id" class="form-control form-control-sm">
						<option value="">-- Select --</option>
						@foreach($phase as $value)
						<option value="{{$value->id}}">{{$value->name}}</option>
						@endforeach
					</select>
                </div>
				<div class="form-group mb-2">
                    <label for="title">BNB</label>
                    <input type="text" name="bnb" value="{{ old('bnb') }}" class="form-control form-control-sm" placeholder="BNB number">
                </div>
				<div class="form-group mb-2">
                    <label for="title">Token</label>
                    <input type="number" name="token" value="{{ old('token') }}" class="form-control form-control-sm" placeholder="{{$settings['ICO_SYMBOL']}}">
                </div>
            </div>
            <div class="card-box">
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