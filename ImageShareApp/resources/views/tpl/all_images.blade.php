@extends('frontend_master')

@section('content')

@if(count($images))
  <ul>

    @foreach($images as $each)
      <li>
        <a href="{{URL::to('snatch/'.$each->id)}}">{{Html::image(Config::get('images.thumb_folder').'/'.$each->image)}}</a>
      </li>
    @endforeach
  </ul> 
  <p>{{$images->links()}}</p>
@else
  {{--If no images are found on the database, I will show a no image found error message--}}
  <p>No images uploaded yet, {{Html::link('/','care to upload one?')}}</p>
@endif

@endSection