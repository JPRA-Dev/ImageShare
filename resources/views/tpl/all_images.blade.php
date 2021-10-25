@extends('layouts.app')

@section('content')

<div class="grid place-items-center min-h-screen mt-15 mb-15">
  <div class="p-4 max-w-5xl grid gap-4 xs:grid-cols-2 xs:p-8 md:grid-cols-4 lg:gap-6">

      @if(count($images))
        @foreach($images as $each)
          <div class="xs:h-auto">
              <a href="{{URL::to('snatch/'.$each->id)}}">
                <img
                src="{{URL::to(Config::get('images.thumb_folder').'/'.$each->image)}}"
                class="w-100 shadow-1-strong rounded mb-4 hover:shadow-2xl"
                alt="This image cannot be displayed"/>
              </a>
          </div>
        @endforeach
      </div>
      <p class="grid place-items-center mt-15 mb-15">{{$images->links()}}</p>
   
    @else
    {{--If no images are found on the database, it will show a 'no image found' error message--}}
    <p>No images uploaded yet, {{Html::link('/','care to upload one?')}}</p>
  </div>
    @endif
  
  
</div>













@endSection