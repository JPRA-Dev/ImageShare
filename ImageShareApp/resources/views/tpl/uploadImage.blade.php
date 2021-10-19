@extends('layouts.app')



@section('content')
<section class="py-16">
  <div class="container mx-auto px-4 ">
    <div class="flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg">
      <div class="px-6" style="margin-top: 50px;">
        <div class="flex flex-wrap justify-center">
          <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
            <div class="flex flex-wrap">
            {{Form::open(array('url' => '/upload/image', 'files' => true, 'class'=>"block text-gray-700 text-sm font-bold mb-2 sm:mb-4"))}}
            </div>
            <div class="flex flex-wrap">
            {{Form::text('title','',array('placeholder'=>'Please insert your title here', 'class'=>" w-full block text-gray-700 text-sm font-bold mb-2 sm:mb-4"))}}
            </div>
            <div class="flex flex-wrap">
            {{Form::file('image', array('class'=>" block text-gray-700 text-sm font-bold mb-2 sm:mb-4"))}}
            </div>
            <div class="flex flex-wrap">
              {{Form::text('description','',array('placeholder'=>'Please give a little description', 'class'=>" w-full block text-gray-700 text-sm font-bold mb-2 sm:mb-4"))}}
              </div>
            <div class="flex flex-wrap">
            {{Form::submit('save!',array('name'=>'send', 'class' => "w-full  select-none font-bold whitespace-no-wrap p-3 rounded-lg uppercase text-base leading-normal no-underline text-white bg-blue-900 hover:bg-white sm:py-4 hover:text-blue-900 hover:shadow-md shadow text-xs px-4 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150"))}}
            </div>
            {{Form::close()}}
          </div>
          </div>
        </div>
        <div class="mt-3 py-3 text-center">
        </div>
      </div>
    </div>

</section>
@endsection