@extends('ICO::layout')
@section('title',"Transaction")
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="d-block d-sm-flex mb-4">
            <h4 class="mb-0 text-black fs-20 mr-auto">Transaction List</h4>
        </div>
    </div>
</div>
<div class="bg-custom border-main">
    <table class="table" id="tb-order">
        <thead>
            <tr>
                <th scope="col" class="text-light">ORDER ID</th>
                <th scope="col" class="text-light">TRANSACTION HASH</th>
                <th scope="col" class="text-light">N.O Token</th>
                <th scope="col" class="text-light">ETH</th>
                <th scope="col" class="text-light">note</th>
                <th scope="col" class="text-light">status</th>
            </tr>
        </thead>
        <tbody>
            @if($transactions->exists())
            @foreach($transactions->get() as $transactions)
            <tr>
                <td class="text-light">{{$transactions->id}}</td>
                <td class="text-light">
                    <a target="_blank" href="https://ropsten.etherscan.io/tx/{{json_decode($transactions->hash)->transactionHash}}">
                        {{substr(json_decode($transactions->hash)->transactionHash,0,15)."..."}}
                    </a>
                </td>
                <td class="text-light">{{$transactions->quantity_token}}</td>
                <td class="text-light">{{$transactions->quantity_eth}}</td>
                <td class="text-light">{{$transactions->note}}</td>
                @if($transactions->status == 2)
                <td class="text-light">Success</td>
                @elseif($transactions->status == 3)
                <td class="text-light">Failed</td>
                @elseif($transactions->status == 1)
                <td class="text-light">Pending</td>
                @else
                <td class="text-light">No Progress</td>
                @endif
            </tr>
            @endforeach
            @else
            <tr class="text-light">
                <td>No data</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection