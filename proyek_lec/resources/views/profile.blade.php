@include('header')
@section('body')

    <body class="">
        <ul class="nav justify-content-center">
            <div class="back">


                <div class="div-center" style="
                background-color: 	#54B4D3;">

                    <div class="content rounded p-2" style="background-color: #54B4D3">
                        <h3 class="text-center">Profile</h3>
                        <hr />
                        <p class="mb-2">Name</p>
                        <div class="border w-100 p-2 bg-info rounded">
                            {{ Auth::User()->user_name }}
                        </div>
                        <p class="mb-2">Email</p>
                        <div class="border w-100 p-2 bg-info rounded">
                            {{ Auth::User()->user_email }}
                        </div>
                        <p class="mb-2">Gender</p>
                        <div class="border w-100 p-2 bg-info rounded">
                            {{ Auth::User()->user_gender }}
                        </div>
                        <p class="mb-2">Date of Birth</p>
                        <div class="border w-100 p-2 bg-info rounded">
                            {{ Auth::User()->user_DOB }}
                        </div>
                        <p class="mb-2">Country</p>
                        <div class="border w-100 p-2 bg-info rounded mb-2">
                            {{ Auth::User()->user_country }}
                        </div>
                    </div>

                    </span>
                </div>
    </body>
