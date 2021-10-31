@extends('layouts.app')

@section('content')
<main class="profile-page">
    <section class="relative block h-500-px">
      <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
        <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
          <polygon class="text-blue-900 fill-current" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>
    <section class="relative py-16 bg-blue-900">
      <div class="container mx-auto px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
          <div class="px-6">
            <div class="flex flex-wrap justify-center">
              <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                Error: {{$error}}
              </div>
              </div>
            </div>
            <div class="mt-3 py-3 text-center">
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection