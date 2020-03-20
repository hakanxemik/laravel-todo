<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>To Do</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        @include('../navbar')
          <div class="container my-10 mx-auto">
            @if(session()->has('success'))
                <div class="my-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-1/3 mx-auto" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{session()->get('success')}}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    </span>
                </div>
             @endif
              <div class="flex flex-wrap justify-center">
                @foreach($todos as $todo)
                <div class="w-full md:w-1/3 m-5 overflow-hidden shadow rounded-lg flex flex-col">
                    <div class="border-b bg-indigo-300 border-gray-200 px-4 py-5 sm:px-6">
                        <!-- Content goes here -->
                        <h1>{{ $todo->name }}</h1>
                        <!-- We use less vertical padding on card headers on desktop than on body sections -->
                    </div>
                    <div class="px-4 py-5 sm:p-6 flex-1">
                        <!-- Content goes here -->
                        <p>{{ $todo->descriptio }}</p>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-4 sm:px-6">
                        <span class="inline-flex rounded-md shadow-sm">
                        <a href="todos/{{$todo->id}}/delete" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-green-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                Complete
                            </a>
                        </span>
                        <span class="text-sm pl-2">Due until: 20.03.20 20:00</span>
                    </div>
                </div>
                @endforeach
            </div>
          </div>
    </body>
</html>
