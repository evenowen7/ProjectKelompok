@extends('header')
@section('body')
    @php
        $collapse_id = 0;
    @endphp

    <body class="">
        <div class="w-50 mx-auto">
            @foreach ($history as $histories)
                <div class="mt-2 mb-2 bg-info rounded">
                    <p class="mt-4 mb-0 w-100 text-center">
                        <a class="btn btn-white w-100" data-bs-toggle="collapse" href="{{ "#Collapse".$collapse_id }}"
                            role="button">
                            Transaction Date {{ $histories->created_at }}
                        </a>
                    </p>
                    <div class="collapse p-2" id="{{ "Collapse".$collapse_id }}">
                        @php
                            $collapse_id += 1;
                        @endphp
                        <div class="row">
                            <h5 class="col-md-7 mt-2">Name</h5>
                            <h5 class="col-md-2 mt-2">Quantity</h5>
                            <h5 class="col-md-3 mt-2">Price</h5>
                        </div>
                        <hr>
                        @php
                            $itemsAmount = 0;
                            $totalPrice = 0;
                        @endphp
                        <div class="row">
                            @foreach ($histories->history_details as $history_detail)
                                <p class="col-md-7">{{ $history_detail->product_details->product_name }}</p>
                                <p class="col-md-2">{{ $history_detail->qty }}</p>
                                @php
                                    $itemsAmount += $history_detail->qty;
                                @endphp
                                <p class="col-md-3">
                                    {{ $history_detail->product_details->product_price * $history_detail->qty }}</p>
                                @php
                                    $totalPrice += $history_detail->product_details->product_price * $history_detail->qty;
                                @endphp
                            @endforeach
                        </div>
                        <hr>
                        <div class="row">
                            <h5 class="col-md-7">Total</h5>
                            <h5 class="col-md-2">{{$itemsAmount}}</h5>
                            <h5 class="col-md-3">{{$totalPrice}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
@endsection
