<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline hover:text-white">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <nav class="flex items-center justify-between flex-wrap bg-teal  text-gray-300 text-sm sm:text-base">
                    @guest
                        <a class="no-underline hover:underline text-white" href="{{ route('login') }}" style="margin-left:7px; margin-right:7px">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline text-white" href="{{ route('register') }}" style="margin-left:7px; margin-right:7px">{{ __('Register') }}</a>
                        @endif
                    @else
                    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                        <a  href="/profile/{{Auth::user()->name}}" style="margin-left:7px; margin-right:7px;">
                            <img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:35px; height:35px; border-radius:50%;">
                        </a>
                        <a class="no-underline hover:underline text-white" href="/profile/{{Auth::user()->name}}" style="margin-left:7px; margin-right:7px">
                            <div>{{ Auth::user()->name }}</div>
                        </a>
                       
                        <a class="no-underline hover:underline text-white" href="{{ url('/upload/image') }}" style="margin-left:7px; margin-right:7px">
                            Upload Image
                        </a>
                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline text-white" style="margin-left:7px; margin-right:7px"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                
            </div>
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
    {{-- <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-8">
    </footer> --}}
</body>
</html>