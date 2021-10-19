@extends('layouts.app')
@section('content')
<!-- Container -->
<div class="container mx-auto">
  <div class="flex justify-center px-6 my-12">
    <!-- Row -->
    <div class="w-full xl:w-3/4 lg:w-11/12 flex">
      <!-- Col -->
      <div>
    {{Html::image(Config::get('images.thumb_folder').'/'.$image->image)}}
      </div>
      <!-- Col -->
      <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
        <div class="px-8 mb-4 text-center">
          <h3 class="pt-4 mb-2 text-2xl">Title: {{$image->title}}</h3>
          <br>
        </div>
        <div class="px-8 mb-4 text-center">
          <h3 class="pt-4 mb-2 text-xl">Uploaded by: <a class="no-underline hover:underline text-gray-700 hover:text-gray-600" href="/profile/{{$user->name}}">{{$user->name}}</a></h3>
          <br>
        </div>
          <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
              Direct Image URL
            </label>
            <input
              class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              onclick="this.select()"
              type="text"
              value="{{URL::to(Config::get('images.upload_folder').'/'.$image->image)}}"
            />
          </div>
          <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
              Thumbnail Forum BBCode
            </label>
            <input
              class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              onclick="this.select()"
              type="text"
              value="[url={{URL::to('snatch/'.$image->id)}}][img]{{URL::to(Config::get('images.thumb_folder').'/'.$image->image)}}[/img][/url]"
            />
          </div>
          <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
              Thumbnail HTML Code
            </label>
            <input
              class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              onclick="this.select()"
              type="text"
              value="{{html_entity_decode(Html::link(URL::to('snatch/'.$image->id),Html::image(Config::get('images.thumb_folder').'/'.$image->image)))}}"
            />
          </div>
          <div class="px-8 mb-4 text-center">
            <h3 class="pt-4 mb-2 text-xl">Description: {{$image->description}}</h3>
            <br>
          </div>

          @if (isset(Auth::user()->id) && Auth::user()->id == $image->user)
          <div class="px-8 mb-4 text-center">
          <a href={{URL::to('editImage/'.$image->id)}} class="text-center">  
            <button class="bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
              Edit/Delete Image
            </button>
          </a>
          </div>
          @endif

          <div class="px-8 mb-4 text-center">
            <h5 class="pt-4 mb-2 text-xl "><a href="{{URL::to('snatch/'.$lastPageNumber)}}" class="hover:text-gray-600 text-gray-700">Last image</a>   |   <a href="{{URL::to('snatch/'.$nextPageNumber)}}" class="hover:text-gray-600 text-gray-700">Next Image</a></h5>
            <br>
          </div>
          {{-- <div class="mb-6 text-center">
            <button
              class="w-full px-4 py-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700 focus:outline-none focus:shadow-outline"
              type="button"
            >
              Reset Password
            </button>
          </div>
          <hr class="mb-6 border-t" />
          <div class="text-center">
            <a
              class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
              href="./register.html"
            >
              Create an Account!
            </a>
          </div>
          <div class="text-center">
            <a
              class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
              href="./index.html"
            >
              Already have an account? Login!
            </a>
          </div> --}}
      </div>
    </div>
  </div>
</div>
@endsection

