<table class="table">
    <thead>
    <tr>
        <th scope="col">Email</th>
        <th scope="col">Kyc</th>
        <th scope="col">WTA</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{substr_replace($user->email,"***",0,5)}}</td>
            @if($user->kyc)
                <td>Completed</td>
            @else
                <td>Unconfirmed</td>
            @endif
            @if($user->kyc && $user->status)
                <td>{{$user->referral_value}}</td>
            @else
                <td>0</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
{!! $users->links("pagination::bootstrap-4") !!}
</div>