@extends('ICO::layoutpage')
@section('title',"Maintenance")
@section('content')
<div class="row">
    <form action="">
        <div class="form-group">
            <h1 class="text-center mt-5" style="color:#fff!important">Website is under maintenance</h1>
        </div>
        <div class="form-group">
            <p class="text-center" style="color:#fff!important">We'll be back when it's done. Thanks for your patience.</p>

        </div>
        <div class="new-account mt-3">
            <p class="text-center" style="color:#fff!important"><a class="text-primary" href="/">Home</a> | <a class="text-primary" href="{{URL::to('logout.html')}}">Logout</a>
            </p>
        </div>
    </form>
</div>
@endsection