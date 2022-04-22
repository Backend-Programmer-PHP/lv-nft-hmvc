@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<script>
    async function get_data(email, id) {
        await fetch('https://ekyc.live/api/v1/kyc-data', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'email': email,
                    'app_id': 1
                })
            })
            .then(response => response.json())
            .then(result => {
                //console.log(result)
                if (result.status) {
                    let photo = document.querySelector(`[data-id='${id}'] .photo`);
                    photo.innerHTML = `
                    <a data-fancybox data-src="${result.data.img_face}">
                    <img width="50" src='${result.data.img_face}'/>
                    </a>
                    `;
                    //console.log("email:"+email +" image : "+result.data.img_face)
                    let ekyc_status = document.querySelector(`[data-id='${id}'] .ekyc_status`);
                    if (result.data.status) {
                        ekyc_status.innerHTML = `<span class="badge bg-soft-success text-success shadow-none">Passed</span>`;
                    } else {
                        ekyc_status.innerHTML = `<span class="badge bg-soft-danger text-danger shadow-none">Failed</span>`;
                    }
                } else {
                    let photo = document.querySelector(`[data-id='${id}'] .photo`);
                    photo.innerHTML = `<span class="badge bg-soft-danger text-danger shadow-none">No KYC</span>`;
                }
            }).catch((error) => {
                alet(error);
            });
    }
    async function view_detail(email) {
        await fetch('https://ekyc.live/api/v1/kyc-data', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'email': email,
                    'app_id': 1
                })
            })
            .then(response => response.json())
            .then(result => {
                console.log(result)
                if (result.status) {
                    let data_html = `
                        <p>Name : <b>${result.data.name}</b></p>
                        <p>Email : <b>${result.data.email}</b></p>
                        <p>Birthday : <b>${result.data.birthday}</b></p>
                        <p>IP Address : <b>${result.data.ip}</b></p>
                        <p>Created : <b>${result.data.created_at}</b></p>
                        <hr/>`;
                    if (result.type == 'identity') {
                        data_html += `<p>Verify Type : <b>${result.type=='identity'? 'Identity Card Number' : result.type}</b></p>
                        <p>ID : <b>${result.data.cmnd}</b></p>
                        <p>
                            Face:
                            <img style="max-width:100%;width:auto;" src="${result.data.img_face}" />
                        </p>
                        <p>
                            Front:
                            <img style="width:100%;" src="${result.data.img_front}" />
                        </p>
                        <p>
                            Back:
                            <img style="width:100%;" src="${result.data.img_back}" />
                        </p>
                        `;
                    }
                    if (result.type == 'driver') {
                        data_html += `<p>Verify Type : <b>${result.type}</b></p>
                        <p>ID : <b>${result.data.id_driver}</b></p>
                        <p>
                            Face:
                            <img style="max-width:100%;width:auto;" src="${result.data.img_face}" />
                        </p>
                        <p>
                            Front:
                            <img style="width:100%;" src="${result.data.img_front}" />
                        </p>
                        <p>
                            Back:
                            <img style="width:100%;" src="${result.data.img_back}" />
                        </p>
                        `;
                    }
                    if (result.type == 'passport') {
                        data_html += `<p>Verify Type : <b>${result.type}</b></p>
                        <p>ID : <b>${result.data.id_number}</b></p>
                        <p>
                            Face:
                            <img style="max-width:100%;width:auto;" src="${result.data.img_face}" />
                        </p>
                        <p>
                            Back:
                            <img style="width:100%;" src="${result.data.img_front_thumb}" />
                        </p>
                        <p>
                            Front:
                            <img style="width:100%;" src="${result.data.img_front}" />
                        </p>
                        
                        `;
                    }
                    $(".result_info").html(data_html);
                } else {
                    $(".result_info").html(`<p>${email} haven't KYC yet</p>`);
                }
            }).catch((error) => {
                alet(error);
            });
    }
</script>
<form method="post" enctype="multipart/form-data">
    @include('Dashboard::inc.formheader')
    @include('Dashboard::inc.message')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="header-title mb-3">{{$row->desc}}</h4>
                <div class="photo mb-3">
                    @if(!empty($ref_detail->photo))
                    <a data-fancybox data-src="/public/{{$ref_detail->photo}}">
                        <img width="50" src="/public/{{$ref_detail->photo}}" />
                    </a>
                    @else
                    <img width="50" src="/public/dashboard/assets/images/users/no-image.svg" />
                    @endif
                </div>
                <p><b>Fullname</b> : {{!empty($ref_detail->fullname)?$ref_detail->fullname:''}}</p>
                <p><b>Email</b> : <a href="javascript:;" data-toggle="modal" data-target="#modal_detail"  onclick="view_detail('{{$ref_detail->email}}')">{{$ref_detail->email}}</a></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h4 class="header-title mb-3">Total Users</h4>
                @php
                $referral_count = DB::table('referral')
                ->where("referral_user_id",$ref_detail->id)->count()
                @endphp
                <p>{{$referral_count}}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h4 class="header-title mb-3">Total Users KYC</h4>
                @php
                $referral_count_kyc = DB::table('referral')
                ->where("referral_user_id",$ref_detail->id)
                ->where("kyc",1)
                ->count()
                @endphp
                <p>{{$referral_count_kyc}}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h4 class="header-title mb-3">Total EARN</h4>
                @php
                $airdrop = DB::table('airdrop')
                ->where("id",$ref_detail->airdrop_id)->first();
                $wta_value = $referral_count_kyc*(!empty($airdrop->referral_value)?$airdrop->referral_value:0);
                @endphp
                <p>{{$wta_value}} WTA</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card-box">
                <table class="table table-sm table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Referral Status</th>
                            <th>KYC Status</th>
                            <th>N.O Token</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $value)
                        <tr data-users_id="{{$value->user_id}}">
                            <td>
                                @if(!empty($value->photo))
                                <a data-fancybox data-src="/public/{{$value->photo}}">
                                    <img width="50" src="/public/{{$value->photo}}" />
                                </a>
                                @else
                                <img width="50" src="/public/dashboard/assets/images/users/no-image.svg" />
                                @endif
                            </td>
                            <td>{{!empty($value->fullname)?$value->fullname:""}}</td>
                            <td>
                                <a href="javascript:;" data-toggle="modal" data-target="#modal_detail"  onclick="view_detail('{{$value->email}}')">
                                    {{$value->email}}
                                </a>
                            </td>
                            <td>
                                @if($value->referral_status)
                                <span class="badge bg-soft-success text-success shadow-none">Success</span>
                                @else
                                <span class="badge bg-soft-danger text-danger shadow-none">Not yet</span>
                                @endif
                            </td>
                            <td>
                                @if($value->kyc)
                                <span class="badge bg-soft-success text-success shadow-none">Success</span>
                                @else
                                <span class="badge bg-soft-danger text-danger shadow-none">Not yet</span>
                                @endif
                            </td>
                            <td>
                                @if($value->referral_status)
                                <b>{{$value->referral_value}}</b>
                                @else
                                0
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagin mt-2">
                    <div class="row">
                        <!--div class="col">
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
                        <div class="col">
                            <?php echo $data->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Dashboard::inc.formfooter')
</form>
<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="result_info"></div>
            </div>
        </div>
    </div>
</div>
@endsection