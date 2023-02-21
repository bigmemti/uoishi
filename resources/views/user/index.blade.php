<x-app-layout>

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__("Users")}} :
        </h1>
    </x-slot>

    <section>
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="w-full">

                            <thead>
                                <tr class="border-b-4 border-b-black text-2xl">
                                    <th class="text-center text-sm md:text-base lg:text-lg xl:text-xl">{{__("#")}}</th>
                                    <th class="text-center text-sm md:text-base lg:text-lg xl:text-xl">{{__("Name")}}</th>
                                    <th class="text-center text-sm md:text-base lg:text-lg xl:text-xl">{{__("Email")}}</th>
                                    <th class="text-center text-sm md:text-base lg:text-lg xl:text-xl">{{__("Action")}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($users as $user)
                                    <tr class="border-b-2 border-b-gray-400 text-xl">
                                        <td class="text-center font-semibold">{{$user->id}}</td>
                                        <td @class(['text-center','line-through' => $user->deleted_at])>{{$user->name}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        <td x-data class="text-center">
                                            <a href="{{route('user.show', ['user' => $user])}}" class="w-18 ring-2 ring-transparent px-3 py-2 text-center rounded-lg
                                                    bg-sky-700 text-white hover:bg-sky-600 active:ring-sky-400 active:bg-sky-500 inline-block my-2" >
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            @if(!$user->deleted_at)
                                                <form @submit.prevent="
                                                    Swal.fire({
                                                        title: '{!!__("Are you sure?")!!}',
                                                        text: '{!!__("You won\\'t be able to revert this!")!!}',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#d33',
                                                        cancelButtonColor: '#666',
                                                        cancelButtonText:'{!!__("Cancel")!!}',
                                                        confirmButtonText: '{!!__("Yes, delete it!")!!}'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            $event.target.submit()
                                                        }
                                                    })
                                                    " action="{{ route('user.destroy', ['user' => $user]) }}" method="POST"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="w-18 ring-2 ring-transparent px-3 py-2 text-center rounded-lg
                                                        bg-red-700 text-white hover:bg-red-600 active:ring-red-400 active:bg-red-500 my-2">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form @submit.prevent="
                                                    Swal.fire({
                                                        title: '{!!__("Are you sure?")!!}',
                                                        text: '{!!__("After restore, the task will return to the Tasks page!")!!}',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3d3',
                                                        cancelButtonColor: '#666',
                                                        cancelButtonText:'{!!__("Cancel")!!}',
                                                        confirmButtonText: '{!!__("Yes, restore it!")!!}'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            $event.target.submit()
                                                        }
                                                    })
                                                    " action="{{ route('user.restore', ['user' => $user]) }}" method="POST"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('patch')
                                                    <button type="submit" class="w-18 ring-2 ring-transparent px-3 py-2 text-center rounded-lg
                                                        bg-green-700 text-white hover:bg-green-600 active:ring-green-400 active:bg-green-500 my-2">
                                                        <i class="fa fa-recycle"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            
                                        </td>
                                    </tr>

                                @empty

                                    <tr class="border-b-2 border-b-gray-400 text-xl">
                                        <td colspan="4" class="text-center text-gray-600 cursor-pointer text-2xl
                                            hover:text-gray-300  hover:bg-gray-700 transition-all duration-300">
                                            <p class="my-2 text-sm md:text-base lg:text-lg xl:text-xl">
                                                {{__("there is no user.")}}
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
        <div class="py-2 px-4">
            {{$users->links()}}
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
