@extends('header')
@section('body')

    <body class="bg-light">
        <ul class="nav justify-content-center">
            <div class="div-center bg-white p-2 border rounded mt-5">

                <div class="content">

                    <h3 class="text-center">Update Product</h3>
                    <hr />
                    <form action="/update/{{ $products->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Name">Product Name</label>
                            <input name="product_name" type="text" class="form-control mb-2" id="product_name"
                                value="{{ $products->product_name }}">
                        </div>
                        <div class="input-group mb-3 text-center">
                            <label for="Category">Product Category</label>
                            <select class="custom-select text-center w-100 p-1 rounded" id="inputGroupSelect01"
                                name="product_category">
                                @foreach ($categories as $category)
                                    <option @if ($products->product_categories_id == $category->id) selected @endif value="{{ $category->id }}">
                                        {{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Detail">Detail</label>
                            <textarea name="product_detail" type="text" class="form-control mb-2 w-100 pb-5" id="products">{{ $products->product_detail }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="Price">Price</label>
                            <input name="product_price" type="number" class="form-control mb-2" id="product_price"
                                value="{{ $products->product_price }}">
                        </div>
                        <div class="form-group">
                            <label for="product_image">Photo</label>
                            <input name="product_photo" type="file" class="form-control mb-2">
                        </div>
                        <button type="submit" class="btn btn-outline-info mt-2">Update Product</button>
                        <hr>
                    </form>
                    @if ($errors->any())
                        <div style="color:red"> {{ $errors->first() }}</div>
                    @endif
                    @if (Session::has('updatedSuccessfully'))
                        {{ Session::get('updatedSuccessfully') }}
                    @endif

                </div>

                </span>
            </div>

    </body>
@endsection
