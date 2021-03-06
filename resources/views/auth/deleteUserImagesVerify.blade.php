@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Would you like to leave your uploaded images on the website after deleting your account?
                </header>

                <div class=" py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    <p class="leading-normal text-gray-500">The uploader will be set as an "unknown user"</p>
                </div>
                
                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="/profile/deleteAccountImages">
                    @csrf
                    @method("DELETE")
                    <div class="flex flex-wrap">
                        <button type="submit" name="yes" value="yes"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg uppercase text-base leading-normal no-underline text-white bg-blue-900 hover:bg-white sm:py-4 hover:text-blue-900 hover:shadow-md shadow text-xs px-4 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
                            Yes
                        </button>
                        <button type="submit" name="no" value="no"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg uppercase text-base leading-normal no-underline text-white bg-blue-900 hover:bg-white sm:py-4 hover:text-blue-900 hover:shadow-md shadow text-xs px-4 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
                            No
                        </button>
                    </div>
            </form>
              

            </section>
        </div>
    </div>
</main>
@endsection