@include('header')

<body class="">
    <div class="d-flex justify-content-around mt-4">
        <form action="/manage" class="w-0">
            <div class="input-group md-form form-sm form-2 p-2">
                <input class="form-control my-0 py-1 red-border" type="text" placeholder="Product Name"
                    aria-label="Search" name="search">
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
        <a href="/add" class="text-decoration-none text-light bg-secondary p-2 ps-3 pe-3 rounded mb-3">Add Product
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
            </svg>
        </a>
    </div>
    <div class="container-content w-75 mx-auto rounded p-3">
        @foreach ($products as $product)
            <div class="row mb-2 bg-light p-2 rounded">
                <img class="img-responsive w-25 col-md-3" src="{{ asset('/storage/images/' . $product->product_photo) }}"
                    alt="">
                <div class="col-md-7">
                    <h4 class="">{{ $product->product_name }}</h4>
                    <p class = "mb-0"><u>Details</u></p>
                    <p class="">{{ $product->product_detail }}</p>
                </div>
                    <a href="/update/{{ $product->id }}" class="col-md-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green"
                            class="bi bi-pencil-square " viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </a>
                    <a href="/delete/{{ $product->id }}" class="col-md-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red"
                            class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path
                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                    </a>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end">
        {{ $products->links() }}
    </div>
</body>
