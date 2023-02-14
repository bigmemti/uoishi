<x-app-layout>

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__("Create To Do")}} :
        </h1>
    </x-slot>

    <section>
        <div class="pt-6 pb-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="{{ route('user.task.store', ['user' => $user]) }}" method="POST" class="flex flex-col gap-4">
                            @csrf

                            <lable class="text-gray-400 font-bold">{{__("Title")}}</lable>
                            <input type="text" name="title" id="title" class="rounded-lg transition-all duration-300" autofocus value="{{old('title')}}">
                            @error('title')
                                <p class="text-sm text-red-600">{{$message}}</p>
                            @enderror
                            <div>
                                <button type="submit" class="ring-2 ring-transparent px-3 py-2 text-center rounded-lg bg-blue-700 text-white
                                    hover:bg-blue-600 active:ring-blue-400 active:bg-blue-500">
                                    {{__("Add")}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="w-full">

                            <thead>
                                <tr class="border-b-4 border-b-black text-2xl">
                                    <th class="text-center text-sm md:text-base lg:text-lg xl:text-xl">{{__("#")}}</th>
                                    <th class="text-center text-sm md:text-base lg:text-lg xl:text-xl">{{__("Title")}}</th>
                                    <th class="text-center text-sm md:text-base lg:text-lg xl:text-xl">{{__("Status")}}</th>
                                    <th class="text-center text-sm md:text-base lg:text-lg xl:text-xl">{{__("Action")}}</th>
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
                                            <input class="hover:cursor-pointer" type="checkbox" :checked="task.status ? true : false" @input="change">
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
                                            <p class="my-2 text-sm md:text-base lg:text-lg xl:text-xl">
                                                {{__("there is no task.")}}
                                            </p>
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mt-3 px-4">
            {{$tasks->links()}}
        </div>
    </section>

    @if (session('success'))
        <script>
            document.addEventListener('alpine:init', () => {
                Toast.fire({
                    icon: 'success',
                    title: @js(session('success'))
                })
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('alpine:init', () => {
                Toast.fire({
                    icon: 'error',
                    title: @js(session('error'))
                })
            })
        </script>
    @endif

</x-app-layout>
