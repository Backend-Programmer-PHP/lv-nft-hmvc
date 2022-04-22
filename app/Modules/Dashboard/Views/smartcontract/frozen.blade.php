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
        <div class="form-group row">
         @if($frozen=="true")
          <div class="col-sm-5">
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="frozen" value="0" checked>
                Hủy bỏ
                <i class="input-helper"></i></label>
            </div>
          </div>
          @else
          <div class="col-sm-4">
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="frozen" value="1" checked>
                Đóng băng
                <i class="input-helper"></i></label>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</form>
@endsection