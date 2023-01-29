@extends('header')
@section('body')

    <body class="">
        <ul class="nav justify-content-center">
            <div class="div-center">

                <div class="content bg-light rounded p-2">

                    <h3 class="text-center">Add Product</h3>
                    <hr />
                    <form action="/add" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Name">Product Name</label>
                            <input name="product_name" type="text" class="form-control mb-2" id="product_name">
                        </div>
                        <div class="update-menu mb-2">
                            <label for="" style="display:block; margin-bottom:5px;">Category</label>
                            <select name="category_name"class="w-100" id="category_name">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Detail">Detail</label>
                            <textarea name="product_detail" type="text" class="form-control mb-2 w-100 pb-5" id="product_detail"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Price">Price</label>
                            <input name="product_price" type="number" class="form-control mb-2" id="product_price">
                        </div>
                        <div class="form-group">
                            <label for="product_img">Photo</label>
                            <input name="product_img" type="file" class="form-control mb-2">
                        </div>
                        <button type="submit" class="btn btn-outline-info mt-2">Add Product</button>
                        <hr>
                        </p>
                        @if ($errors->any())
                            <div style="color:red"> {{ $errors->first() }}</div>
                        @endif
                        @if (Session::has('addedProduct'))
                            {{ Session::get('addedProduct') }}
                        @endif
                    </form>

                </div>
                </span>

            </div>

    </body>
@endsection
