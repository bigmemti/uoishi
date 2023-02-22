<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{config('app.locale') == 'fa' ? 'rtl' : 'ltr'}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <style>
            .banner{
                font-family : Freestyle Script;
                font-size : 5rem;
                text-align : center;
                color : #3C1787;
            }
        </style>
    </head>
    <body>
        <div class="min-h-screen flex flex-col justify-start items-center">
            <header>
                <nav>
                    <h1 class="banner">
                        uoishi
                    </h1>
                </nav>
            </header>
            <main>
                <section>
                    <div class="flex flex-col-reverse mt-3 md:flex-row md:items-center">
                        <div class="mt-5 px-4 md:max-w-md">
                            <p>
                                یوئویشی یک سامانه انجام کار مبتنی بر وضعیت است که امکانات خوبی را در 
                                اختیار کاربران خود می گذارد.
                                امید است که هر روز به پیشرفت خود ادامه دهد
                            </p>
                            @auth
    
                            @endauth
                            @guest
                                <div class="flex justify-center items-center space-x-3 rtl:space-x-reverse mt-4">
                                    <a class="text-white bg-violet-600 text-xs p-3 md:text-base md:p-4 rounded-xl hover:bg-violet-500 border-2 border-transparent hover:border-violet-400" href="{{route('login')}}">{{__('Log in')}}</a>
                                    <a class="text-white bg-violet-600 text-xs p-3 md:text-base md:p-4 rounded-xl hover:bg-violet-500 border-2 border-transparent hover:border-violet-400" href="{{route('register')}}">{{__('Register')}}</a>
                                </div>
                            @endguest
                        </div>
                        <div class="flex justify-center md:max-w-md">
                            <img class="w-[300px] md:w-[650px]" src="{{asset('task.png')}}" alt="">
                        </div>
                    </div>
                </section>
            </main>
            <footer class="grow-[2] flex flex-col justify-end self-stretch">
                <div class="bg-[#3C1787] text-center py-6 text-white">
                    <span class="" >با افتخار نیرو گرفته از  
                        ©
                        <a href="https://github.com/bigmemti">
                            bigmemti 
                        </a>
                    </span>
                </div>
            </footer>
        </div>
    </body>
</html>
