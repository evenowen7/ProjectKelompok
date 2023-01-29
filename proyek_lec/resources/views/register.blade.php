@include('header')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
<body class="">
    <ul class="nav justify-content-center">
        <div class="back">


            <div class="div-center p-2" style = "width: 450px;
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

                <div class="content bg-light p-3">
                    <h3 class="text-center">Register</h3>
                    <hr />
                    @if ( Config::get('app.locale') == 'en')

                        <a href="/register/id">Go to Indonesian Page.</a>

                    @else
                    <a href="/register">Go to English Page.</a>
                    @endif
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Name">{{__('form.input.name')}}</label>
                            <input name="user_name" type="name" class="form-control mb-2" id="RegisterName"
                                placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="Email">{{__('form.input.e-mail')}}</label>
                            <input name="user_email" type="email" class="form-control mb-2" id="RegisterEmail"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="RegisterPassword">{{__('form.input.password')}}</label>
                            <input name="password" type="password" class="form-control mb-3" id="RegisterPassword"
                                placeholder="Password">
                        </div>
                        <div class="form-group mb-2">
                            <label for="RegisterPasswordValidate">{{__('form.input.re-password')}}</label>
                            <input name="password_confirmation" type="password" class="form-control mb-3"
                                id="RegisterPasswordValidate" placeholder="Password">
                        </div>
                        <label for="flexRadioDefault1">{{__('form.input.gender_title')}}</label>
                        <div class="form-check">
                            <input name="user_gender" class="form-check-input" type="radio" name="flexRadioGender"
                                id="genderRadio" value="Male">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{__('form.input.gender.male')}}
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input name="user_gender" class="form-check-input" type="radio" name="flexRadioGender"
                                id="genderRadio" value="Female">
                            <label class="form-check-label" for="flexRadioDefault2">
                                {{__('form.input.gender.female')}}
                            </label>
                        </div>
                        <label for="DateRegister">{{{__('form.input.dob')}}}</label>
                        <div class="form-group mb-2">
                            <input name="user_DOB" type="date" class="w-100 text-center rounded p-1" id="start" name="trip-start">
                        </div>
                        <label for="inputGroupSelect01">{{__('form.input.country')}}</label>
                        <div class="input-group mb-3 text-center">
                            <select class="custom-select text-center w-100 p-1 rounded" id="inputGroupSelect01" name="user_country">
                                <option selected>Choose...</option>
                                <option value="Australia">Australia</option>
                                <option value="Brazil">Brazil</option>
                                <option value="China">China</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Singapore">Singapore</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Vietnam">Vietnam</option>
                            </select>
                        </div>
                        <div class="button text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>

                        <hr>
                        <p>{{__('form.input.haveaccount')}} <a href="/login">Login</a>
                        </p>
                        @if($errors->any())
                        <div style="color:red"> {{$errors->first()}}</div>
                        @endif
                    </form>
                    @if (Session::has('registerSuccessfully'))
                    {{ Session::get('registerSuccessfully') }}
                    @endif
                </div>

                </span>
            </div>
</body>
