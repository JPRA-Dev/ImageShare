<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
  <meta http-equiv="content-type"content="text/html; charset=utf-8">
  <title>My Image Sharing Website</title>
  {{Html::style('css/styles.css')}}
  </head>

  <body>
    {{--Your title of the image (and yeah, blade enginehas its own commenting, cool, isn't it?)--}}
    <h2>My Awesome Image Sharing Website</h2>

    {{--If there is an error flashdata in session(from form validation), we show the first one--}}
    @if(Session::has('errors'))
      <h3 class="error">{{$errors->first()}}</h3>
    @endif

    {{--If there is an error flashdata in session whichis set manually, we will show it--}}
    @if(Session::has('error'))
      <h3 class="error">{{Session::get('error')}}</h3>
    @endif

    {{--If we have a success message to show, we printit--}}
    @if(Session::has('success'))
      <h3 class="error">{{Session::get('success')}}</h3>
    @endif

    {{--We yield (get the contents of) the section named'content' from the view files--}}
    @yield('content')

  </body>
</html>