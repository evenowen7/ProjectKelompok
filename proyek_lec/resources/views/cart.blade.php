@extends('header')
@section('body')
    @php
        $productTotal = 0;
    @endphp

    <body class="">
        <div class="container-content w-75 mx-auto bg-white mt-5 rounded p-3">
            @foreach ($cart->cart_details as $cart_detail)
                <div class="row mb-2">
                    <img class="img-responsive col-md-3"
                        src="{{ asset('/storage/images/' . $cart_detail->product_details->product_photo) }}" alt="">
                    <div class="col-md-8">
                        <h4 class="">{{ $cart_detail->product_details->product_name }}</h4>
                        <p class="">Quantity: {{ $cart_detail->quantity }}</p>
                        <p>Total Price: IDR {{ $cart_detail->quantity * $cart_detail->product_details->product_price }}
                            @php
                                $productTotal += $cart_detail->quantity * $cart_detail->product_details->product_price;
                            @endphp
                        </p>
                    </div>
                    <a href="/deleteCart/{{ $cart_detail->id }}" class="col-md-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red"
                            class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path
                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="bg-white fixed-bottom p-3 text-center">
            @if ($productTotal != 0)
                <p class="">
                    Total Price: IDR {{ $productTotal }}
                    <a href="/purchase" class="btn btn-outline-info ps-3 pe-3 ms-5 mb-1" role="button">
                        Purchase
                    </a>
                </p>
            @endif
            @if (Session::has('purchasedSuccessfully'))
                {{ Session::get('purchasedSuccessfully') }}
            @endif
        </div>
    </body>
@endsection
