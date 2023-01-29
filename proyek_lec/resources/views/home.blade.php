@extends('header')


@section('body')

    <body class="">
        <br>
        <form action="/searchresult" method="POST" class="w-75 mx-auto">
            @csrf
            <div class="input-group md-form form-sm form-2 p-2">
                <input class="form-control my-0 py-1 red-border" type="text" placeholder="" aria-label="Search" id="search"
                    name="search">
                <div class="input-group-append">
                    <span class="input-group-text bg-secondary" id="basic-text1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="white"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </span>
                </div>
            </div>
        </form>
        @foreach ($categories as $category)
            <div class="container-conconcon bg-white border rounded mx-auto w-75 p-2 mb-2">
                <p class="ms-3 fw-bold">
                    {{ $category->category_name }} <a href="/category/{{ $category->id }}">View All</a>
                </p>
                <div class="row mb-2 flex-nowrap overflow-auto ms-1 me-2">
                    @foreach ($category->product_details as $product)
                        <div class="col-md-5 w-25">
                            <a class="text-decoration-none text-body" href="/product/{{ $product->id }}">
                                <div class="card bg-light mb-3">
                                    <img class="img" src="{{ asset('/storage/images/' . $product->product_photo) }}"
                                        alt="">
                                    <div class="card-body">

                                        {{ $product->product_name }}

                                        <p class="fw-bold">IDR {{ $product->product_price }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </body>
@endsection
