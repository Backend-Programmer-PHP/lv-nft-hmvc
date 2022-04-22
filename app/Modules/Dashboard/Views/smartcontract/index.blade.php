@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<form method="post">
    @csrf

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <div class="form-inline">
                        <!--div class="form-group">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-white" name="search" value="{{Cookie::get('search_users')}}" placeholder="Name...">
                                <div class="input-group-append">
                                    <button type="submit" name="btn_search" class="input-group-text bg-blue border-blue text-white">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/trash" class="btn btn-blue btn-sm ml-2">
                            <i class="fe-trash"></i>
                        </a-->
                        <a href="javascript: window.location.reload();" class="btn btn-blue btn-sm ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <!--a href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/add" class="ladda-button waves-effect waves-light btn btn-blue btn-sm ml-1" data-style="expand-right">
                            <span class="ladda-label"><i class="fe-plus-circle"></i></span>
                            <span class="ladda-spinner"></span>
                        </a-->
                    </div>
                </div>
                <h4 class="page-title">{{$row->title}}</h4>
            </div>
        </div>
    </div>
    @include("Dashboard::inc.message")
    <div class="row">
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row align-items-top">
                        <div class="ml-0">
                            <h5 class="text-youtube"><a href="https://ropsten.etherscan.io/address/{{$settings['ICO_CONTRACT_ADDRESS']}}" target="_blank">{{$settings['ICO_CONTRACT_ADDRESS']}}</a></h5>
                            <p class="mt-2 text-muted card-text">Contract address</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row align-items-top">
                        <div class="ml-0">
                            <h5 class="text-youtube"><a href="https://ropsten.etherscan.io/token/{{$settings['ICO_CONTRACT_ADDRESS']}}" target="_blank">{{$settings['ICO_CONTRACT_ADDRESS']}}</a></h5>
                            <p class="mt-2 text-muted card-text">Token address</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row align-items-top">
                        <div class="ml-0">
                            <h5 class="text-youtube"> {!!$frozen=='false'? "<i class='icon-check text-success'></i> Đang hoạt động":"<i class='icon-close text-danger'></i> Đang đóng băng"!!}</h5>
                            <p class="mt-2 text-muted card-text">Trạng thái đóng băng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection