@extends('layouts.app')


@section('content')
<main class="profile-page">
    <section class="relative block h-500-px">
      <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
              background-image: url('/uploads/bgImages/{{ $user->bgImage }}');
            ">
      </div>
      <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
        <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
          <polygon class="text-blue-900 fill-current" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>
    <section class="relative py-16 bg-blue-900">
      <div class="container mx-auto px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
          <div class="px-6">
            <div class="flex flex-wrap justify-center">
              <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center" style="margin-bottom: 100px;">
                <div class="relative">
                  <img src="/uploads/avatars/{{ $user->avatar }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                </div>
              </div>
              @if ($userCheck)
              <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                <div class="py-6 px-3 mt-32 sm:mt-0">
                    <a href="/editProfileInfo">  
                      <button action="/editProfileInfo" class="bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                        Edit Info
                      </button>
                    </a>
                    <a href="/editProfileAvatar">  
                      <button action="/editProfileAvatar" class="bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                        Update Profile Picture
                      </button>
                    </a>
                    <a href="/editProfileBGImage">  
                      <button action="/editProfileBGImage" class="bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                        Update Profile Background
                      </button>
                    </a>
                    <a href="{{ URL::to('/changeEmail') }}">
                      <button action="/editProfileBGImage" class="bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                        Change Email
                      </button>
                    </a>
                    {{-- <button class="bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                    <a class="no-underline hover:underline text-white" href="{{ route('verify') }}" style="margin-left:7px; margin-right:7px">{{ __('Login') }}</a>
                    </button> --}}
                  </a>
                </div>
              </div>
              @endif
              <div class="w-full lg:w-4/12 px-4 lg:order-1">
                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                    <div class="mr-4 p-3 text-center">
                      <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span class="text-sm text-blueGray-400">Likes</span>
                    </div>
                    <div class="mr-4 p-3 text-center">
                      <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">10</span><span class="text-sm text-blueGray-400">Images</span>
                    </div>
                  </div>
              </div>
            </div>
            <div class="text-center mt-12">
              <h3 class="text-4xl font-semibold leading-normal text-blueGray-700">
                {{$user->name}}
              </h3>
              <div class="text-md leading-normal  mb-6 text-blueGray-400 font-bold uppercase">
                <i class=" mr-2 text-lg text-blueGray-400"></i>
                {{$user->firstName}} {{$user->lastName}}
              </div>
              <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                {{$user->town}}, {{$user->country}}
              </div>
              <div class="mb-2 text-blueGray-600 mt-10">
                <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>{{$user->work}}
              </div>
              <div class="mb-2 text-blueGray-600">
                <i class="fas fa-link mr-2 text-lg text-blueGray-400"></i>{{$user->website}}
              </div>
            </div>
            <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
              <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-9/12 px-4">
                  <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                    {{$user->description}}
                  </p>
                  {{-- <a href="#pablo" class="font-normal text-pink-500">Show more</a> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection