@extends('layouts.app')

@section('content')

@if(count($images))
<div class="container mx-auto  lg:space-y-0 lg:gap-2 lg:grid lg:grid-cols-3">
    @foreach($images as $each)
    <div class="w-full rounded hover:shadow-2xl">
        <a href="{{URL::to('snatch/'.$each->id)}}">{{Html::image(Config::get('images.thumb_folder').'/'.$each->image)}}</a>
    </div>
    @endforeach
</div>
  </ul> 
  <p>{{$images->links()}}</p>
@else
  {{--If no images are found on the database, it will show a 'no image found' error message--}}
  <p>No images uploaded yet, {{Html::link('/','care to upload one?')}}</p>
@endif

@endSection