@include('header')
@section('body')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body class="bg-white">

    <ul class="nav justify-content-center">
        <div class="back">

            <div class="div-center bg-light" style ="width: 450px;
            height: 425px;
            background-color: 	#F8F9FA;
            position: absolute;
            left: 0;
            right: 0;
            top: 200px;
            bottom: 0;
            margin: auto;
            max-width: 100%;
            max-height: 100%;
            overflow: auto;
            padding: 1em 2em;
            border-bottom: 4px solid #ccc;
            display: table;
            border-radius:2%;">

                <div class="content">

                    <h3 class = "text-center">Login</h3>
                    <hr />
                    @if ( Config::get('app.locale') == 'en')

                        <a href="/login/id">Go to Indonesian Page.</a>

                    @else
                    <a href="/login">Go to English Page.</a>
                    @endif
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Email">{{__('form.input.name')}}</label>
                            <input name = "user_email" type="email" class="form-control mb-2" id="LoginEmail" placeholder="Enter Your Email" value ="{{Cookie::get('user_email') != null ? Cookie::get('user_email') : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="Password">{{__('form.input.password')}}</label>
                            <input name = "password" type="password" class="form-control mb-3" id="LoginPassword"
                                placeholder="Enter Your Password">
                        </div>
                        <div class="form-group mb-2">
                            <input name = "remember_me" class="form-check-input" type="checkbox" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              {{__('form.input.remember')}}
                            </label>
                          </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <hr>
                        <p>{{__('form.input.noaccount')}}<a href="/register">Register</button>
                        </p>
                        @if($errors->any())
                        <div style="color:red"> {{$errors->first()}}</div>
                        @endif
                    </form>

                </div>

                </span>
            </div>
</body>
