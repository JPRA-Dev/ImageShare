<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    
    
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

   

</head>

<body >
    
        <header >
            <nav>
            <div>
                <div class="antialiased bg-gray-100 dark-mode:bg-gray-900 ">
                <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
                  <div x-data="{ open: true }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                    <div class="flex flex-row items-center justify-between p-4">
                      <a href="{{ url('/') }}" class="text-lg text-blue-900 font-semibold tracking-widest uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">{{ config('app.name', 'Laravel') }}</a>
                      <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                          <path x-show="!open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                          <path x-show="open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                      </button>
                      
                    </div>
                    
                    <nav :class="{'flex': !open, 'hidden': open}" class="flex-col flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">
                        
                        @guest
                        <a class="px-4 py-2 mt-2 text-sm  font-semibold text-blue-900 bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-white hover:bg-blue-900" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="px-4 py-2 mt-2 text-sm  font-semibold text-blue-900 bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-white hover:bg-blue-900" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                    {{-- class="sm:px-4 sm:py-2 sm:mt-2" --}}
                    <div class="hidden md:block">
                      <a href="/profile/{{Auth::user()->name}}">
                          <img src="/uploads/avatars/{{Auth::user()->avatar}}" class="shadow-xl rounded-full" style="width:35px; height:35px; border-radius:50%;">
                      </a>
                    </div>
                    <a class="px-4 py-2 mt-2 text-sm  font-semibold text-blue-900 bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-white hover:bg-blue-900" href="/profile/{{Auth::user()->name}}">
                        <div>{{ Auth::user()->name }}</div>
                    </a>
                   
                    <a class="px-4 py-2 mt-2 text-sm  font-semibold text-blue-900 bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-white hover:bg-blue-900" href="{{ url('/upload/image') }}">
                        Upload Image
                    </a>
                    <a href="{{ route('logout') }}"
                    class="px-4 py-2 mt-2 text-sm  font-semibold text-blue-900 bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-white hover:bg-blue-900 md:pb-12" 
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>

                     
                      @endguest
                    </nav>
                  </div>
                </div>
              </div>
            </div>
            </nav>
        </header>
        {{------- ERROR HANDLER -------}}

        @if (\Session::has('success'))
        <div class="w-full bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
          <p class="font-bold">Success</p>
          <p class="text-sm">{{\Session::get('success')}}</p>
        </div>
        @endif

        @if (\Session::has('error'))
        <div class="w-full bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
          <p class="font-bold">Error</p>
          <p class="text-sm">{{\Session::get('error')}}</p>
        </div>
        @endif

        {{-- ------------------------ --}}

        @yield('content')
   
    {{-- <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-8">
    </footer> --}}
</body>



</html>