@extends('ICO::layout')
@section('title',"Wallet")
@section('content')
@include('ICO::inc.successmessage')
@include('ICO::inc.errormessage')
<form method="post" action="{{route('ico.token.sale.index.post')}}">
    @csrf
<!--    <div class="form-group">-->
<!--        <label for="exampleInputEmail1">Số dư trong ví</label>-->
<!--        @if((float)$eth_balance == 0)-->
<!--        <input type="text" class="form-control" value="0" name="eth_blance" disabled>-->
<!--        @else-->
<!--        <input type="text" class="form-control" value="{{$eth_balance}}" name="eth_blance" disabled>-->
<!--        @endif-->
<!--    </div>-->
    <div class="form-group">
        <label for="exampleInputPassword1">Rate (eth ~ token)</label>
        <input type="text" class="form-control" name="rate" value="{{$rate->eth." ETH = " .number_format($rate->token)}}" disabled>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Minimum quantity buy token</label>
        <input type="text" class="form-control" name="min_token_eth" value="{{$phase->limit_buy_token}}" disabled>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="phase_id" value="{{$phase->id}}" hidden>
<!--        <label for="exampleInputPassword1" >Quantity (token) max: <span id="show_token_remaining"></span></label>-->
        <label for="exampleInputPassword1" >Quantity (token)</label>
        <input type="number" class="form-control mb-3" name="quantity_token" value="{{old('quantity_token')}}" required>
<!--        <input type="number" class="form-control mb-3" name="quantity_token" value="{{old('quantity_token')}}" onchange="call_token_limit()"-->
<!--               onkeypress="call_eth_rate_token1" required>-->
        <label>ETH</label>
        <input type="number" class="form-control" id="token_rate_eth_token" value="" disabled>
        <span id="error_quantity_token"></span>
    </div>

    <button type="submit" class="btn btn-primary">Buy</button>
</form>

<script>
    // let call_token_remaining = setInterval(function (){
    //     let id = $("input[name=phase_id]").val();
    //     if(id == undefined){
    //         clearInterval(call_token_remaining)
    //     }
    //     $.ajax({
    //         type: 'POST',
    //         url: "/token-sale/token-remaining",
    //         data: {
    //             _token: $('meta[name="csrf-token"]').attr('content'),
    //             id: id
    //         },
    //         success:
    //             function(data){
    //                 if(data.status == "false"){
    //                     if(document.getElementById('show_token_remaining')){
    //                         document.getElementById('show_token_remaining').innerHTML = data.msg
    //                     }
    //                 }
    //                 else{
    //                     if(document.getElementById('show_token_remaining')){
    //                         document.getElementById('show_token_remaining').innerHTML = data.token_remaining
    //                     }
    //                 }
    //             },
    //     });
    // },1000)
    let call_eth_rate_token1 = setInterval(function (){
        // let eth = $("input[name=eth_rate_token]").val();
        let token = $("input[name=quantity_token]").val();


        let id = $("input[name=phase_id]").val();
        if(id == undefined){
            clearInterval(call_eth_rate_token)
        }

        $.ajax({
            type: 'POST',
            url: "/token-sale/eth-rate-token",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                // eth: eth,
                id : id,
                token: token,
            },
            success:
                function(data){
                    if(data.status == "false"){
                        // if (document.getElementById('eth_rate_token_token')){
                        //     document.getElementById('eth_rate_token_token').value = data.msg
                        // }
                        if (document.getElementById('token_rate_eth_token')){
                            document.getElementById('token_rate_eth_token').value = data.msg
                        }

                    }else{
                        // if (document.getElementById('eth_rate_token_token')){
                        //     document.getElementById('eth_rate_token_token').value = data.token
                        // }
                        if (document.getElementById('token_rate_eth_token')){
                            document.getElementById('token_rate_eth_token').value = data.eth
                        }
                    }
                },
        });

    },1000);

    // let call_token_limit = function (){
    //     let quantity_token = $("input[name=quantity_token]").val();
    //     let id = $("input[name=phase_id]").val();
    //     $.ajax({
    //         type: 'POST',
    //         url: "/token-sale/token-limit",
    //         data: {
    //             _token: $('meta[name="csrf-token"]').attr('content'),
    //             id : id,
    //             quantity_token:quantity_token
    //         },
    //         success:
    //             function(data){
    //                 if(data.status == "false"){
    //                     if (document.getElementById('error_quantity_token')){
    //                         document.getElementById('error_quantity_token').innerHTML = data.msg
    //                     }
    //                 }else{
    //                     if (document.getElementById('error_quantity_token')){
    //                         document.getElementById('error_quantity_token').innerHTML = null
    //                     }
    //                 }
    //             },
    //     });
    // }
</script>
@endsection