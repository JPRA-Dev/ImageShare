@extends('layouts.app')
@section('content')
<!-- Container -->
<div class="container mx-auto">
  <div class=" justify-center px-6 my-12 mx-auto">
    <!-- Row -->
    <div class="md:hidden  flex justify-center items-center mb-10">
      <div class="max-w-28 mx-6">
        <a href="{{URL::to(Config::get('images.upload_folder').'/'.$image->image)}}" target="_blank">
          {{Html::image(Config::get('images.thumb_folder').'/'.$image->image)}}
        </a>
      </div>
    </div>
  <div class="w-full flex">
      <!-- Col -->
      <div class="hidden md:flex">
        <a href="{{URL::to(Config::get('images.upload_folder').'/'.$image->image)}}" target="_blank">
          {{Html::image(Config::get('images.thumb_folder').'/'.$image->image)}}
        </a>
      </div>
      <!-- Col -->
      <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
        <div class="px-8 mb-4 text-center">
          <h3 class="pt-4 mb-2 text-2xl">Title: {{$image->title}}</h3>
          <br>
        </div>
        <div class="px-8 mb-4 text-center">

          @if ($user === NULL)
            <h3 class="pt-4 mb-2 text-xl">Uploaded by: <a class="no-underline hover:underline text-gray-700 hover:text-gray-600">Unknown User</a></h3>
          @else
            <h3 class="pt-4 mb-2 text-xl">Uploaded by: <a class="no-underline hover:underline text-gray-700 hover:text-gray-600" href="/profile/{{$user->name}}">{{$user->name}}</a></h3>
          @endif

          <br>
        </div>
     
        <div class="container">
          <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
              Direct Image URL
            </label>
            <input
              class="flex justify-center w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              onclick="this.select()"
              type="text"
              value="{{URL::to(Config::get('images.upload_folder').'/'.$image->image)}}"
            />
          </div>
          <div class="mb-4 ">
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
        </div>
    
          <div class="px-8 mb-4 text-center" style="margin-top: 50px;">
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

        @guest

        <div class="px-8 mb-4 text-center" style="margin-top: 50px;">
          <div>
            Likes: {{$imageLikesCount}}
          </div>
        </div>

        @else
          
          <div class="px-8 mb-4 text-center" style="margin-top: 50px;">
            <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8"
            action={{ url('like/image/'.$image->id) }} method="POST">
              @csrf

              <div>
                Likes: {{$imageLikesCount}}
              </div>
              
            @if(Auth::user()->isFollowing($image))
              
                <button type="submit" class="bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                  <i class="fa fa-thumbs-down mr-2"></i>Unlike Image
                </button>       

            @else

                <button type="submit" class="bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                  <i class="fa fa-thumbs-up mr-2"></i>Like Image
                </button>
              
            @endif
            </form>
          </div>
        
       @endguest
            
          <div class="px-8 mb-4 text-center" style="margin-top: 50px;">
            <h5 class="pt-4 mb-2 text-xl ">
              <a href="{{URL::to('snatch/'.$lastId)}}" class="bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150">
              << Last image</a>   
              <div class="md:hidden">
                <br>
              </div>    
              <a href="{{URL::to('snatch/'.$nextId)}}" class="bg-blue-900 hover:bg-white uppercase text-white hover:text-blue-900 font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150">
              Next Image >></a>
            </h5>
            <br>
          </div>

      </div>
    </div>
  </div>
</div>
@endsection

