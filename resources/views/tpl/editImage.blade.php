@extends('layouts.app')

@section('content')
<main class="profile-page">
  
    <section class="relative block h-500-px">
      <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
              background-image: url('/uploads/bgImages/{{ Auth::user()->bgImage }}');
            ">
        <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
      </div>
      <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
        <svg class="absolute bottom-0 overflow-hidden " xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
          <polygon class="text-blue-900 fill-current text-center" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>
    <section class="relative py-16 bg-blue-900">
      <div class="container mx-auto px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white mb-6 shadow-xl rounded-lg -mt-64">
          <div class="px-6">
            <div class="img-overlay">
              <a href={{URL::to("snatch/$image->id")}}>
            <button type="button" class="select-none whitespace-no-wrap p-2 rounded-lg text-base leading-normal no-underline text-white bg-blue-900 hover:bg-white sm:py-4 hover:text-blue-900 hover:shadow-md shadow  rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150 float-right" style="margin-top: 10px;">
              Cancel
            </button>
              </a>
            </div>
            
            <div class="flex flex-wrap justify-center">
              
              <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                <div class="w-full px-4 lg:order-3 lg:text-right lg:self-center">
                  <div style="margin-top: 50px;">
                    {{Html::image(Config::get('images.thumb_folder').'/'.$image->image)}}
                      </div>
                </div>
                
                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8"
                action={{"/editImage/$image->id"}} method="POST">
                  @csrf
                  @method("PUT")

                  <div class="flex flex-wrap">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        Edit Image Title
                    </label>

                    <input id="title" type="text" class="form-input w-full"
                        name="title" value="{{ $image->title }}">
                  </div>

                  @if($errors->has('title'))
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block">{{ $errors->first('title') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                  </div>
                @endif

                  <div class="flex flex-wrap">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        Edit Image Description
                    </label>

                    <input id="description" type="text" class="form-input w-full"
                        name="description" value="{{ $image->description }}">
                  </div>

                  @if($errors->has('description'))
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block">{{ $errors->first('description') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                  </div>
                @endif


                  <div class="flex flex-wrap">
                    <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg uppercase text-base leading-normal no-underline text-white bg-blue-900 hover:bg-white sm:py-4 hover:text-blue-900 hover:shadow-md shadow text-xs px-4 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
                        Save Image
                    </button>
                  </div>

                </form>

                
                  <div class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8">
                  <div class="flex flex-wrap">
              
                  <a href={{URL::to("delete/$image->id")}}>
                    <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg uppercase text-base leading-normal no-underline text-white bg-blue-900 hover:bg-white sm:py-4 hover:text-blue-900 hover:shadow-md shadow text-xs px-4 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
                        Delete Image
                    </button>
                  </a>
                  </div>
                </div>
              </div>
           
             
              </div>
            </div>
            <div class="mt-3 py-3 text-center">
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection