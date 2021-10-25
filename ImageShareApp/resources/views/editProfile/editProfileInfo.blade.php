@extends('layouts.app')

@section('content')
<main class="profile-page">
    <section class="relative block h-500-px">
      <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
              background-image: url('/uploads/bgImages/{{ $user->bgImage }}');
            ">
        <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
      </div>
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
            
                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8"
                  action="/editProfileInfo" method="POST">
                    @csrf
                    @method("PUT")

                    <div class="flex flex-wrap">
                      <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                          {{ __("Edit Profile Name") }}:
                      </label>

                      <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                          name="name" value="{{ $user->name }}">
                    </div>

                    <div class="flex flex-wrap">
                      <label for="firstName" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                          {{ __("Edit First Name") }}:
                      </label>

                      <input id="firstName" type="text" class="form-input w-full @error('firstName')  border-red-500 @enderror"
                          name="firstName" value="{{ $user->firstName }}">
                  </div>

                  <div class="flex flex-wrap">
                    <label for="lastName" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __("Edit Last Name") }}:
                    </label>

                    <input id="lastName" type="text" class="form-input w-full @error('lastName')  border-red-500 @enderror"
                        name="lastName" value="{{ $user->lastName }}">
                  </div>

                    <div class="flex flex-wrap">
                        <label for="town" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __("Edit Town") }}:
                        </label>

                        <input id="town" type="text" class="form-input w-full @error('town')  border-red-500 @enderror"
                            name="town" value="{{ $user->town }}">
                    </div>

                    <div class="flex flex-wrap">
                      <label for="country" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                          {{ __("Edit Country") }}:
                      </label>

                      <input id="country" type="text" class="form-input w-full @error('country')  border-red-500 @enderror"
                          name="country" value="{{ $user->country }}">
                  </div>

                  <div class="flex flex-wrap">
                    <label for="work" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __("Edit Work") }}:
                    </label>

                    <input id="work" type="text" class="form-input w-full @error('work')  border-red-500 @enderror"
                        name="work" value="{{ $user->work }}">
                  </div>  
                  
                  <div class="flex flex-wrap">
                    <label for="website" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __("Edit Website") }}:
                    </label>

                    <input id="website" type="url" class="form-input w-full @error('website')  border-red-500 @enderror"
                        name="website" value="{{ $user->website }}">
                  </div>

                 
                  <div class="flex flex-wrap">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4" >
                        {{ __("Edit Description") }}:
                    </label>

                    <textarea id="description" type="text" class="form-input w-full @error('description')  border-red-500 @enderror"
                        name="description" >{{$user->description}}</textarea>
                  </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg uppercase text-base leading-normal no-underline text-white bg-blue-900 hover:bg-white sm:py-4 hover:text-blue-900 hover:shadow-md shadow text-xs px-4 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
                            {{ __('Save Profile') }}
                        </button>
                    </div>
                </form>
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