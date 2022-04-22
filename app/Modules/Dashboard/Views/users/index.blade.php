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
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-white" name="search" value="{{Cookie::get('search_users')}}" placeholder="Email...">
                                <div class="input-group-append">
                                    <button type="submit" name="btn_search" class="input-group-text bg-blue border-blue text-white">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--a href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/trash" class="btn btn-blue btn-sm ml-2">
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
        <div class="col-md-12 mb-5">
            <div class="card-box">
                <div class="responsive-table-plugin">
                    <div class="table-wrapper">
                        <div class="table-rep-plugin fixed-solution">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table class="table table-sm table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <!--th>#</th-->
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Email</th>                                            
                                            <th>Balance</th>
                                            <th>2FA</th>
                                            <th>Status</th>
                                            <th>KYC</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <!--th>Tools</th-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $value)
                                        <tr>
                                            <!--th scope="row"><input type="checkbox" name="check[]" value="{{$value->id}}" /></th-->
                                            <td><img width="50" src="/public/{{!empty($value->photo)?'/'.$value->photo:'dashboard/assets/images/users/no-image.svg'}}"/></td>
                                            <td>{{$value->fullname}}</td>
                                            <td><a href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/edit/{{$value->id}}" title="chỉnh sửa {{$value->title}}">{{$value->email}}</a></td>
                                            <!--td><a href="https://ropsten.etherscan.io/address/{{$value->address}}" target="_blank">{{$value->address}}</a></td-->

                                            <td>
                                                @if(!empty($value->address))
                                                @php
                                                $get_balance = Helper_Dashboard::api_get("/wallet/get-balance/?address=".$value->address)->balance;
                                                $balance = $get_balance==0.00?0:$get_balance;
                                                $balance = explode(".",$get_balance)[1]=="0000"?explode(".",$get_balance)[0]:$get_balance;
                                                @endphp
                                                {{$balance}} BNB
                                                @endif
                                            </td>
                                            <td>
                                                @if($value->google2fa_enable)
                                                <span class="badge bg-soft-success text-success shadow-none">Enabled</span>
                                                @else
                                                <span class="badge bg-soft-dark text-dark shadow-none">Disabled</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($value->status)
                                                <span class="badge bg-soft-success text-success shadow-none">Enabled</span>
                                                @elseif(!$value->status)
                                                <span class="badge bg-soft-danger text-danger shadow-none">Disabled</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($value->kyc_status)
                                                <span class="badge bg-soft-success text-success shadow-none">Passed</span>
                                                @elseif(!$value->kyc_status)
                                                <span class="badge bg-soft-danger text-danger shadow-none">Not Yet</span>
                                                @endif
                                            </td>
                                            <td>{{$value->created_at}}</td>
                                            <td>{{$value->updated_at}}</td>
                                            <!--d>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-blue btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-settings"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"  x-placement="bottom-start" >
                                                        <a class="dropdown-item" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/edit/{{$value->id}}"><i class="fe-edit-2"></i> Chỉnh sửa</a>
                                                        @if($value->status==1)
                                                        <a class="dropdown-item text-danger" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/status/{{$value->id}}/0"><i class="fe-lock"></i> Khóa</a>
                                                        @elseif($value->status==0)
                                                        <a class="dropdown-item text-success" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/status/{{$value->id}}/1"><i class="fe-check-circle"></i> Kích hoạt</a>
                                                        @endif
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger" href='/admin/blog/delete/[{"id":{{$value->id}}}]'><i class="fe-trash-2"></i> Xóa</a>
                                                    </div>
                                                </div>
                                            </td-->
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagin mt-2">
                    <div class="row">
                        <!--div class="col-md-3">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-trash-2"></i> <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                    <a class="dropdown-item" href="#" onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'check[]', true);return false;"><i class="fe-check-square"></i> Tất cả</a>
                                    <a class="dropdown-item" href="#" onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'check[]', false);return false;"><i class="fe-x"></i> Hủy bỏ</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" delete-all="true" url="/{{Helper_Dashboard::get_patch(1)}}/{{Helper_Dashboard::get_patch(2)}}/delete" href="#"><i class="fe-trash-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div-->
                        <div class="col-md-12">
                            <?php echo $data->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection