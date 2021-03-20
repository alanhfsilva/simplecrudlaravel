<html>
    <head>
        <title>Simple Laravel CRUD</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>  
        <div class="container">
            @component('components.navbar',["current" => $current])
                
            @endcomponent
            <hr>
            <main role="main">
                @hasSection ('body')
                    @yield('body')
                @endif
            </main>
        </div>
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>
