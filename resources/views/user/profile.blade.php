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
              <div class="w-full lg:w-3/12 px-4 lg:order-2 sm:mb-32 md:mb-32 flex justify-center">
                <div class="relative">
                  <img src="/uploads/avatars/{{ $user->avatar }}" class="shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                </div>
              </div>
              
              
              @if ($userCheck)
              <div class="w-full lg:w-4/12 px-4 lg:order-3">
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
                    <a href="{{ URL::to('profile/deleteAccount') }}">
                      <button action="/profile/deleteAccount" class="bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                        Delete Account
                      </button>
                    </a>

                    
                  
                  
                </div>
              </div>
              <div class="w-full lg:w-4/12 px-4 lg:order-1">
                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                    <div class="mr-4 p-3 text-center">
                      <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$imageLikesCount}}</span><span class="text-sm text-blueGray-400">Image Likes</span>
                    </div>
                    <div class="mr-4 p-3 text-center">
                      <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$imageCount}}</span><span class="text-sm text-blueGray-400">Images Uploaded</span>
                    </div>
                  </div>
              </div>
            </div>

              @else
            
              <div class="w-full lg:w-4/12 px-4 lg:order-3 ">
                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                  <div class="mr-4 p-3 text-center">
                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$imageCount}}</span><span class="text-sm text-blueGray-400">Images Uploaded</span>
                  </div>
                </div>
              </div>
              <div class="w-full lg:w-4/12 px-4 lg:order-1">
                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                    <div class="mr-4 p-3 text-center">
                      <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$imageLikesCount}}</span><span class="text-sm text-blueGray-400">Image Likes</span>
                    </div>
                    
                  </div>
              </div>
            </div>
            @endif
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
                @if ($user->website == "https://www.MyWebsite.com")
                  <a href="{{URL::current()}}">
                @else
                  <a href="{{$user->website}}">
                @endif
                  <i class="fas fa-link mr-2 text-lg text-blueGray-400"></i>{{$user->website}}
                  </a>
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

           
                

              {{-- UPLOAD IMAGES --}}

              
                  

                    <div class="border-t border-blueGray-200 flex flex-wrap justify-center">
                      @if((count($userImages)) OR (isset($likedImagesShow)))
                      <div  class="grid place-items-center grid-cols-2 flex bg-center bg-cover mt-10">
                        @if(count($userImages))
                        <button onclick="upImagesFunction()" class="col-1 bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                          Uploaded Images
                        </button>
                        @endif
                        @if(isset($likedImagesShow))
                        <button onclick="likedImagesFunction()" class="col-2 bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                          Liked Images
                        </button>
                        @endif
                      </div>
                      @endif


                      @if(count($userImages))
                      <div id="userImages" class="grid w-full lg:w-9/12 px-4 ">

                        <div class="grid place-items-center min-h-screen">
                          <div class="p-4 max-w-5xl grid gap-4 xs:grid-cols-2 xs:p-8 md:grid-cols-2 xl:grid-cols-4 lg:gap-6">
                        
                            @foreach($userImages as $each)
                              <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                  <a href="{{URL::to('snatch/'.$each->id)}}">
                                    <img
                                    src="{{URL::to(Config::get('images.thumb_folder').'/'.$each->image)}}"
                                    class="w-100 shadow-1-strong rounded mb-4 hover:shadow-2xl"
                                    alt="This image cannot be displayed"/>
                                  </a>
                              </div>
                            @endforeach

                            <p class="grid place-items-center mb-10">{{$userImagesPaginate->links()}}</p>
                    
                          </div>
                        </div>
                      </div>
                      @endif

                      @if(isset($likedImagesShow))
                      <div id="likedImages" class="w-full lg:w-9/12 px-4" style="display: none;">

                        <div class="grid place-items-center min-h-screen">
                          <div class="p-4 max-w-5xl grid gap-4 xs:grid-cols-2 xs:p-8 md:grid-cols-2 xl:grid-cols-4 lg:gap-6">
                        
                            @foreach($likedImagesShow as $each)
                              <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                  <a href="{{URL::to('snatch/'.$each[0]->id)}}">
                                    <img
                                    src="{{URL::to(Config::get('images.thumb_folder').'/'.$each[0]->image)}}"
                                    class="w-100 shadow-1-strong rounded mb-4 hover:shadow-2xl"
                                    alt="This image cannot be displayed"/>
                                  </a>
                              </div>
                            @endforeach

                            {{-- <p class="grid place-items-center mb-10">{{$likedImagesPaginate[0]->links()}}</p> --}}
                    
                          </div>
                        </div>
                      </div>
                      @endif

                    </div>

                  

          </div>
        </div>
      </div>
    </section>
  </main>
@endsection