@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<link href="/public/dashboard/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css">
<form method="post" enctype="multipart/form-data">
    @include('Dashboard::inc.formheader')
    @include('Dashboard::inc.message')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="header-title mb-3">{{$row->desc}}</h4>

                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Users</label>
                            <select class="form-control form-control-sm js-example-basic-single w-100" name="users_id">
                                <option value="0">-- Không chọn --</option>
                                @if(!empty($list_users))
                                @foreach($list_users as $value)
                                <option value="{{$value->id}}">{{$value->email}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label>Total Lock</label>
                            <input type="input" name="total_locked" value="{{ old('total_locked') }}" class="form-control form-control-sm" placeholder="Ex: 10000">
                        </div>
                    </div>
                    <!--div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Percent amount</label>
                            <input type="input" name="percent_amount" value="{{ old('percent_amount') }}" class="form-control form-control-sm" placeholder="Ex: 10">
                        </div>
                    </div-->
                </div>
            </div>
        </div>
    </div>
    @include('Dashboard::inc.formfooter')
</form>
<script src="/public/dashboard/assets/libs/select2/select2.min.js"></script>
<script>
    (function($) {
        'use strict';
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }
        if ($(".js-example-basic-multiple").length) {
            $(".js-example-basic-multiple").select2();
        }
    })(jQuery);
</script>
@endsection