<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{config('app.locale') == 'fa' ? 'rtl' : 'ltr'}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 pt-32">
            <!-- Page Content -->
            <main>
                <div class="container mx-auto">

                    <section>
                        <div>
                            <h1 class=" text-3xl font-extrabold ">{{__("Create To Do")}} :</h1>

                            <div>
                                <form action="{{ route('user.task.store', ['user' => $user]) }}" method="POST" class="flex flex-col mt-16 gap-4">
                                    @csrf

                                    <lable class="text-gray-400 font-bold">{{__("Title")}}</lable>
                                    <input type="text" name="title" id="title" class="rounded-lg transition-all duration-300" autofocus value="{{old('title')}}">
                                    @error('title')
                                        <p class="text-sm text-red-600">{{$message}}</p>
                                    @enderror

                                    <button type="submit" class="w-16 rtl:w-28 ring-2 ring-transparent px-3 py-2 text-center rounded-lg bg-blue-700 text-white
                                        hover:bg-blue-600 active:ring-blue-400 active:bg-blue-500">
                                        {{__("Add")}}
                                    </button>
                                </form>
                            </div>

                        </div>
                    </section>

                    <section>
                        <div class="mt-8">
                            <table class="w-full">

                                <thead>
                                    <tr class="border-b-4 border-b-black text-2xl">
                                        <th class="text-center">{{__("#")}}</th>
                                        <th class="text-center">{{__("Title")}}</th>
                                        <th class="text-center">{{__("Status")}}</th>
                                        <th class="text-center">{{__("Action")}}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($tasks as $task)
                                        <tr class="border-b-2 border-b-gray-400 text-xl"
                                            x-data="{
                                                    task : {
                                                        id : {{$task->id}},
                                                        status : {{$task->status}}
                                                    },
                                                    change(event){
                                                            fetch('{{route("task.status", ['task' => ':task'])}}'.replace(':task',this.task.id), {
                                                                method: 'PATCH',
                                                                body: JSON.stringify({
                                                                    status: event.target.checked,
                                                                }),
                                                                headers: {
                                                                'Content-type': 'application/json; charset=UTF-8',
                                                                },
                                                            }).then(response => response.json())
                                                            .then(data => {
                                                                this.task.status = data.data.status;
                                                                Toast.fire({
                                                                    icon: 'success',
                                                                    title: '{!!__("Successfully updated.") !!}'
                                                                })
                                                            })
                                                    }
                                            }">
                                            <td class="text-center font-semibold">{{$task->id}}</td>
                                            <td class="text-center" :class="task.status ? 'text-gray-400 line-through': null">{{$task->title}}</td>
                                            <td class="text-center">
                                                <input type="checkbox" :checked="task.status ? true : false" @input="change">
                                            </td>
                                            <td class="text-center">

                                                <form @submit.prevent="
                                                    Swal.fire({
                                                        title: '{!!__("Are you sure?")!!}',
                                                        text: '{!!__("You won\\'t be able to revert this!")!!}',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        cancelButtonText:'{!!__("Cancel")!!}',
                                                        confirmButtonText: '{!!__("Yes, delete it!")!!}'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            $event.target.submit()
                                                        }
                                                    })
                                                    " action="{{ route('task.destroy', ['task' => $task]) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="w-18 ring-2 ring-transparent px-3 py-2 text-center rounded-lg
                                                        bg-red-700 text-white hover:bg-red-600 active:ring-red-400 active:bg-red-500 my-2">
                                                        {{__("delete")}}
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>

                                    @empty

                                        <tr class="border-b-2 border-b-gray-400 text-xl">
                                            <td colspan="4" class="text-center text-gray-600 cursor-pointer text-2xl
                                                hover:text-gray-300  hover:bg-gray-700 transition-all duration-300">
                                                <p class="my-2">
                                                    {{__("there is no task.")}}
                                                </p>
                                            </td>
                                        </tr>

                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                        <div class="my-4">
                            {{$tasks->links()}}
                        </div>
                    </section>

                </div>
            </main>
        </div>

        <div class="fixed left-7 bottom-7 bg-yellow-400 rounded-full w-11 h-11 text-2xl flex justify-center items-center">
            <a href="{{route('dashboard')}}"><i class="fa-solid fa-arrow-left"></i></a>
        </div>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
        </script>

        @if (session('success'))
            <script>
                Toast.fire({
                    icon: 'success',
                    title: @js(session('success'))
                })
            </script>
        @endif

        @if (session('error'))
            <script>
                Toast.fire({
                    icon: 'error',
                    title: @js(session('error'))
                })
            </script>
        @endif

    </body>
</html>
