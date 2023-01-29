@extends('header')
@section('body')

    <body class="bg-white">
        <div class="container-conconcon bg-light border rounded mx-auto w-75 p-2 mb-2 mt-2">
            <p class="ms-3 fw-bold">
                {{ $categories->category_name }}
            </p>
            <div class="row mb-2 ms-1 me-2 overflow-auto">
                @foreach ($productsList as $product)
                    <div class="col-md-5 w-25 mt-2">
                        <div class="card">
                            <img class="img" src="{{ asset('/storage/images/' . $product->product_photo) }}" alt="">
                            <div class="col-md-7 card-body">
                                <a class="text-decoration-none text-body" href="/product/{{ $product->id }}">
                                    {{ $product->product_name }}
                                </a>
                                <p class="fw-bold">IDR {{ $product->product_price }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-end">
            {{ $productsList->links() }}
        </div>


    </body>
@endsection
