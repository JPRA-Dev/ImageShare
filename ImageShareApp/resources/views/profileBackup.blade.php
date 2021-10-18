@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <div class="card-header">{{Auth::user()->name}}'s Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <form enctype="multipart/form-data" action="/profile" method="POST">
                    <label>Update Profile Image</label>
                    <input type='file' name='avatar'>
                    <input type="hidden" name='_token' value="{{ csrf_token() }}">
                    <input type='submit'>
                </form>

                {{-- <div class="card-body">
                    <form action="{{route('home')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image">
                        <input type="submit" value="Upload">
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection