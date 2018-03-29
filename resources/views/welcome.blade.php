<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
            
        <script src="js/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    </head>
    <body>
        <div id="app" class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
            @yield('content')
                </div>

                <div class="links">
                    <a v-for="link in links" :href="link.href" v-text="link.text"></a>
                </div>
            </div>
            <ul>
                <li v-for="skill in skills">@{{ skill }}</li>
            </ul>
        </div>
        <script src="/js/script.js"></script>
        <style type="text/css">
            .error{color: red;}
        </style>
    </body>
</html>
