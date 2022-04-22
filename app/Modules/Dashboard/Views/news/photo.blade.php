@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">{{$row->title}}</h4>
            </div>
        </div>
    </div>
    @if(count($errors)>0)
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-danger">
                    <h5 class="card-title"><i class="fe-alert-triangle"></i> Đã xảy ra lỗi</h5>
                    <ul style="margin: 0;padding: 0 15px;">
                        @foreach($errors->all() as $key => $value)
                        <li class="card-text">{{$value}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
    @include("Dashboard::inc.message")
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="row">
                <div class="col-md-6 mb-1">
                    <div class="card-box">
                        <?php
                        $thumbsize = json_decode($settings["THUMB_SIZE_POST"]);
                        ?>
                        <label>Upload (jpg,png) [{{$thumbsize->width."x".$thumbsize->height}}px]</label>
                        <div class="input-group mb-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input " name="photo" id="photo">
                                <label class="custom-file-label" for="photo">Choose file</label>
                            </div>
                        </div>
                        <div class="input-group">
                            <button type="submit" name="addphoto" class="ladda-button btn btn-success waves-effect waves-light btn-sm" data-style="expand-right">
                                <span class="ladda-label"><i class="ti-save"></i> Save</span>
                                <span class="ladda-spinner"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <h5>{{$post->title}}</h5>
                <div class="responsive-table-plugin">
                    <div class="table-wrapper">
                        <div class="table-rep-plugin fixed-solution">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table class="table table-sm table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hình</th>
                                            <th>Trạng thái</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $value)
                                        <tr>
                                            <th scope="row"><input type="checkbox" name="check[]" value="{{$value->id}}" /></th>
                                            <td><img src='/public/upload/images/post/large/{{$value->name}}' width="50" /></td>
                                            <td>
                                                @if($value->status)
                                                <span class="badge bg-soft-success text-success shadow-none">Kích hoạt</span>
                                                @elseif(!$value->status)
                                                <span class="badge bg-soft-danger text-danger shadow-none">Khóa</span>
                                                @endif
                                            </td>
                                            <td>{{$value->created_at}}</td>
                                            <td>{{$value->updated_at}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-blue btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-settings"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
                                                        <!--a class="dropdown-item" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/edit/{{$value->id}}"><i class="fe-edit-2"></i> Chỉnh sửa</a-->
                                                        @if($value->status==1)
                                                        <a class="dropdown-item text-danger" href="/dashboard/post/photo/status/{{$value->id}}/0"><i class="fe-lock"></i> Khóa</a>
                                                        @elseif($value->status==0)
                                                        <a class="dropdown-item text-success" href="/dashboard/post/photo/status/{{$value->id}}/1"><i class="fe-check-circle"></i> Kích hoạt</a>
                                                        @endif
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger" href='/dashboard/post/photo/delete/{{$value->id}}'><i class="fe-trash-2"></i> Xóa</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection