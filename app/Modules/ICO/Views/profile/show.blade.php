@extends('ICO::layout')
@section('title',"profile show")
@section('content')
    @include('ICO::inc.successmessage')

    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" value="{{auth("web")->user()->email}}" disabled>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" value="{{auth("web")->user()->fullname}}" disabled>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" class="form-control" value="{{auth("web")->user()->phone}}" disabled>
        </div>
    </form>
@endsection