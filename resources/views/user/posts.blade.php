@extends('layouts.app')


@section('content')


<

<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @if($posts->count())
                        @foreach($posts as $post)
                            <article class="col-xs-12 col-sm-6 col-md-3">
                                <div class="panel panel-info" data-id="{{ $post->id }}">
                                    <div class="panel-body">
                                        <a href="https://www.codechief.org/user/img/user.jpg" title="Nature Portfolio" data-title="Amazing Nature" data-footer="The beauty of nature" data-type="image" data-toggle="lightbox">
                                    <img src="https://www.codechief.org/user/img/user.jpg" style="height: 50px; width: 50px; border-radius: 50%;">
                                            <span class="overlay"><i class="fa fa-search"></i></span>
                                        </a>
                                    </div>  
                                    <div class="panel-footer">
                                        <h4><a href="#" title="Nature Portfolio">{{ $post->title }}</a></h4>
                                        <span class="pull-right">
                                            <span class="like-btn">
                                                <i id="like{{$post->id}}" class="glyphicon glyphicon-thumbs-up {{ auth()->user()->toggleFollow($post) ? 'like-post' : '' }}"></i> <div id="like{{$post->id}}-bs3">{{ $post->followers()->count() }}</div>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection