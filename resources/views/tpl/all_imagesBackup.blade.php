@extends('layouts.app')

@section('content')

<div class="container mx-auto" style="margin-top: 50px;">
  <div class="row">
    @if(count($images))
    @foreach($images as $each)
      <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
          <a href="{{URL::to('snatch/'.$each->id)}}">
            <img
            src="{{URL::to(Config::get('images.thumb_folder').'/'.$each->image)}}"
            class="w-100 shadow-1-strong rounded mb-4 hover:shadow-2xl"
            alt="This image cannot be displayed"/>
          </a>
      </div>
    @endforeach

  </div>
</div>

<p>{{$images->links()}}</p>
@else
{{--If no images are found on the database, it will show a 'no image found' error message--}}
<p>No images uploaded yet, {{Html::link('/','care to upload one?')}}</p>
@endif




@endSection