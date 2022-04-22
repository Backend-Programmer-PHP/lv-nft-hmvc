<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                {{--<div class="header-left">
                    <div class="input-group search-area right d-lg-inline-flex d-none">
                        <input type="text" class="form-control" placeholder="Find something here...">
                        <div class="input-group-append">
                            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                        </div>
                    </div>
                </div>--}}
                <ul class="navbar-nav header-right main-notification">
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell-o"></i>
                            <span id="total_notify" class="badge light text-white rounded-circle" style="background-color: #b769a0;display:none;">0</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div id="dlab_W_Notification" class="widget-media dz-scroll p-3 height380 ps" style="display: none;">
                                <p class="text-right"><a href="javascript:mark_read_all();" style="color:#b1adc4">Mark all</a></p>
                                <ul class="timeline">
                                    {{--
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media-body">
                                                <p class="mb-1 text-white">Resport created successfully</p>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                            <div class="media ml-1" style="background: none;">
                                                <a href="" style="color: #b769a0;"><i class="fa fa-circle" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media-body">
                                                <p class="mb-1 text-white">Resport created successfully</p>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media-body">
                                                <p class="mb-1 text-white">Resport created successfully</p>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>--}}
                                </ul>
                            </div>
                            <!--a class="all-notification" id="see_all_notification" style="display: none;" href="javascript:void(0)">See all notifications <i class="ti-arrow-right"></i></a-->
                            <a class="all-notification" id="no_nofification" href="javascript:void(0)"><i class="fa fa-bell-o"></i> No notification</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="/account.html">
                            @if(auth()->user("web")->photo)
                            <img src="{{asset('public/'.auth()->user("web")->photo)}}" alt="">
                            @else
                            <img src="/public/assets/images/4a4aefaeb6696571bc3c0307d5bd8a50.jpeg" />
                            @endif
                            <div class="header-info">
                                <small>{{auth()->user("web")->fullname}}</small>
                                <span style="font-size: 14px;color: #C4C4C4;font-weight: normal;">Member</span>
                                {{-- <small>{{ substr_replace(auth()->user("web")->email,"*****",0,5)}}</small>--}}
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span><span class="line"></span><span class="line"></span>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="modal fade show" id="profile-show" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content  bg-custom border-main">
            <div class="modal-header">
                <h5 class="modal-title">Profile</h5>
                <button type="button" class="close" data-dismiss="modal"><span><i class="la la-close"></i></span>
                </button>
            </div>
            @foreach ($errors->all() as $error)
            @if($error)
            <div class="alert alert-danger">
                <li>{{ $error }}</li>
            </div>
            @endif
            @endforeach
            <div id="notification"></div>
            <div class="modal-body">
                <div class="input-group input-group-lg mb-4">
                    <input type="text" class="form-control" name="name" value="{{auth()->user()->fullname}}" required>
                </div>
                <div class="input-group input-group-lg mb-4">
                    <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}" disabled>
                </div>
                <a href="" class="btn btn-primary" id="btn-update-profile">Save changes</a>
            </div>
        </div>
    </div>
</div>