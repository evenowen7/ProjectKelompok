@extends('header')
@section('body')

    <body class="bg-white">
        <div class="div-center mx-auto w-50 bg-light p-3 rounded" style="margin-top: 175px">
            {{-- entah kenapa gabisa kalo ga manual :D --}}
            <div class="row mb-2">
                <img class="img-responsive col-md-5" src="{{ asset('/storage/images/' . $products->product_photo) }}"
                    alt="">
                <div class="brruh col-md-7">
                    <h4 class="">{{ $products->product_name }}</h4>
                    <p class="fw-bold mb-0"><u>Details</u></p>
                    <p class="mb-1">{{ $products->product_detail }}</p>
                    <p class="fw-bold mb-0"><u>Price</u></p>
                    <p class="mb-1">IDR {{ $products->product_price }}</p>
                    @if (Auth::check())
                        @if (Auth::User()->user_type == 'user')
                            <p class="fw-bold mb-0"><u>Quantity</u></p>
                            <form action="/checkout/{{ $products->id }}" method="POST">
                                @csrf
                                <div>
                                    <input type="number" id="replyNumber" min="0" data-bind="value:replyNumber"
                                        class="w-75" name="quantity">
                                </div>
                                <button class="btn btn-outline-secondary mt-2" type="submit">
                                    Purchase
                                </button>
                            </form>
                        @endif
                    @endif
                    @if ($errors->any())
                        <div style="color:red"> {{ $errors->first() }}</div>
                    @endif
                    @if (Session::has('addedSuccessfully'))
                        {{ Session::get('addedSuccessfully') }}
                    @endif
                </div>
            </div>
        </div>
    </body>
@endsection
