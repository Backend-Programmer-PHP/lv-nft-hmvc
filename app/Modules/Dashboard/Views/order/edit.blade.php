@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<form method="post" enctype="multipart/form-data">
    <div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<a href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}" class="btn btn-danger waves-effect btn-sm ml-2"><i class="mdi mdi-close-circle"></i></a>
					<a href="javascript: window.location.reload();" class="btn btn-light waves-effect waves-light btn-sm ml-2">
						<i class="mdi mdi-autorenew"></i>
					</a>
				</div>
				<h4 class="page-title">Order - detail</h4>
			</div>
		</div>
	</div>
    @include('Dashboard::inc.message')
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Profile</h5>
                  <div class="align-items-start pb-4 border-bottom">
                      <p class="text-dark font-weight-medium">{{$data->fullname}}</p>
                      <p class="text-muted">Peace On Earth A Wonderful With But No Way</p>
                  </div>
                  <div class="d-flex align-items-start pb-4 pt-4 border-bottom">
                    <div>
                      <div class="icon-rounded-primary icon-rounded-md">
                        <h4 class="font-weight-normal">A</h4>
                      </div>
                    </div>  
                    <div class="ml-3">
                      <p class="text-muted">09:30 am</p>
                      <p class="text-dark font-weight-medium">Maud Delgado</p>
                      <p class="text-muted">On Being Human</p>
                      <button class="btn btn-primary btn-sm px-4 mt-2">More</button>
                    </div>
                  </div>
                  <div class="d-flex align-items-start pb-2 pt-4">
                    <div>
                      <div class="icon-rounded-primary icon-rounded-md">
                        <h4 class="font-weight-normal">A</h4>
                      </div>
                    </div>  
                    <div class="ml-3">
                      <p class="text-muted">10:30 am</p>
                      <p class="text-dark font-weight-medium">Hettie Douglas</p>
                      <p class="text-muted">Althusser Competing Interpellations And Third Text</p>
                      <button class="btn btn-primary btn-sm px-4 mt-2">More</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
</form>
@endsection