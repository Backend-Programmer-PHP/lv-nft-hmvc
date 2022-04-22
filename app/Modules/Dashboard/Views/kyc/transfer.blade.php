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
<form method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <div class="form-inline">
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-white" name="search" value="{{Cookie::get('search_kyc')}}" placeholder="email...">
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
                                            <th>ID</th>
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Bonus</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $value)
                                        <tr data-id="{{$value->id}}">
                                            <td>{{$value->id}}</td>
                                            <script>
                                                get_data('{{$value->email}}', `{{$value->id}}`);
                                            </script>
                                            @php
                                            $kyc_info = null;//Helper_Dashboard::api_kyc_post("/kyc-data",array('email'=>$value->email,'app_id'=>1));

                                            //echo $kyc_info->status;
                                            //var_dump($kyc_info);
                                            @endphp
                                            <!--th scope="row"><input type="checkbox" name="check[]" value="{{$value->id}}" /></th-->
                                            <td class="photo">
                                                <i class="icon-refresh loading_icon"></i>
                                            </td>
                                            <td>{{$value->fullname}}</td>
                                            <td><a data-toggle="modal" data-target="#modal_detail" href="javascript:;" onclick="view_detail('{{$value->email}}')" title="Detail">{{$value->email}}</a></td>
                                            <td>
                                                @php
                                                $bonus = DB::table('bonus')
                                                ->join("airdrop","airdrop.id","=","bonus.airdrop_id")
                                                ->where("bonus.users_id",$value->id)
                                                ->sum('airdrop.bonus_value')
                                                @endphp
                                                {{$bonus}} {{$settings['ICO_SYMBOL']}}
                                            </td>
                                            <td>
                                                @if($value->status)
                                                <span class="badge bg-soft-success text-success shadow-none">Enabled</span>
                                                @elseif(!$value->status)
                                                <span class="badge bg-soft-danger text-danger shadow-none">Disabled</span>
                                                @endif
                                            </td>
                                            <td>{{$value->created_at}}</td>
                                            <td>{{$value->updated_at}}</td>
                                            <td style="display:flex" data-ispay="{{$value->is_pay}}">
                                                @if(!empty($value->hash_wta))
                                                <a href="https://bscscan.com/tx/{{json_decode($value->hash_wta)->transactionHash}}" target="_blank"><i class="icon-arrow-right-circle"></i> Transaction</a>
                                                @endif
                                                <!--div class="dropdown">
                                                    <button type="button" class="btn btn-blue btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-settings"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
                                                        <a class="dropdown-item text-danger" target="_blank" href='/dashboard/kyc/cancel-bonus/{{$value->bonus_id}}/{{$value->airdrop_id}}'><i class="fe-trash-2"></i> Cancel Bonus</a>
                                                    </div>
                                                </div-->
                                            </td>
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
                        <div class="col">
                            <?php echo $data->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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