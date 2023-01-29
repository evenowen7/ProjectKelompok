<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Can Cell</title>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</head>
<nav class="navbar navbar-expand-lg bg-info ps-5 pe-5">
    <div class="container-fluid">
        <a class="navbar-brand text-decoration-none text-black fw-bold" href="/home" style="color:inherit">Can Cell</a>
        <!-- somehow someway teksnya gamau berubah warna :) -->
        <div class="collapse navbar-collapse" id="navbar    Contents">
            <ul class="nav-item dropdown mb-2 mb-lg-0">
                <a class="nav-link dropdown-toggle" href="#" role="button" style="color:inherit" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Category
                </a>
                <ul class="dropdown-menu">
                    @foreach($categories as $category)
                    <li> <a class="dropdown-item"
                            href="/category/{{$category->id}}">{{$category->category_name}}</a></li>
                    @endforeach
                </ul>
            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if(Auth::Check())
                @if(Auth::User()->user_type == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="/manage" style="color:inherit">Manage Product</a>
                </li>
                @endif
                @endif

            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                @if(Auth::Check())
                @if(Auth::User()->user_type == 'user')
                <a href="/cart" style="color:inherit">
                    <li class = "pt-2 w-100 h-100 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="grey" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                    </li>
                </a>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"style="color:inherit"
                        aria-expanded="false">
                        {{Auth::User()->user_name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        @if(Auth::user()->user_type == 'user')
                        <li><a class="dropdown-item" href="/history">History</a></li>
                        @endif
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/login"style="color:inherit">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register"style="color:inherit">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@yield('body')





</html>
