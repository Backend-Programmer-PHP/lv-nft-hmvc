@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<form method="post" enctype="multipart/form-data">
    @include('Dashboard::inc.formheader')
    @include("Dashboard::inc.message")
    <div class="row">
        <div class="col-md-7">
            <div class="card-box">
                <h5 class="mb-3 mt-0 text-uppercase bg-light p-2"><i class="mdi mdi-square-edit-outline"></i> Thông tin ICO</h5>
                <div class="form-group mb-3">
                    <label>ICO Name</label>
                    <input type="text" name="ICO_NAME" value="{{$settings['ICO_NAME']}}" class="form-control" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label>ICO SYMBOL</label>
                    <input type="text" name="ICO_SYMBOL" value="{{$settings['ICO_SYMBOL']}}" class="form-control" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label>ICO DECIMALS</label>
                    <input type="text" name="ICO_DECIMALS" value="{{$settings['ICO_DECIMALS']}}" class="form-control" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label>ICO CONTRACT ADDRESS</label>
                    <input type="text" name="ICO_CONTRACT_ADDRESS" value="{{$settings['ICO_CONTRACT_ADDRESS']}}" class="form-control" placeholder="">
                </div>
            </div>
        </div>
    </div>
    @include('Dashboard::inc.formfooter')
</form>
@endsection