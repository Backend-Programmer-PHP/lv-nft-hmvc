@extends('ICO::layout')
@section('title',"Security")
@section('content')
<h3>Referral Program</h3>
<ul style="color:#fff">
{{--    @if($Registered)--}}
    <li>Registered referral : {{$Registered}}</li>
    <li>Active referral : {{$Active}}</li>
    <li>Incentives : {{$Incentives}}</li>
</ul>

<table class="table table-striped">
    <thead>
    <tr style="color:#fff">
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Name</th>
        <th scope="col">active_referral</th>
        <th scope="col">bonus</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr style="color:#fff">
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{$user->email}}</td>
        <td>{{$user->fullname}}</td>
        <td>{{$user->active_referral}}</td>
        <td>{{$user->bonus}}%</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection