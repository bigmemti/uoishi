<x-app-layout>

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__("User")}}  {{$user->name}} :
        </h1>
    </x-slot>

    <section>
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                       <div class="grid lg:grid-cols-3 md:grid-cols-2">
                            <p class="text-center px-1">{{__('Id')}} : {{$user->id}}</p>
                            <p class="text-center px-1">{{__('Name')}} : {{$user->name}}</p>
                            <p class="text-center px-1">{{__('Email')}} : {{$user->email}}</p> 
                            <p class="text-center px-1">{{__('Task per page')}} : {{$user->task_per_page}}</p>
                            <p class="text-center px-1">{{__('Is admin')}} : {{$user->is_admin ? __('yes') : __('no')}}</p>
                            <p class="text-center px-1">{{__('Created At')}} : {{$user->created_at}}</p>
                            <p class="text-center px-1">{{__('Updated At')}} : {{$user->updated_at}}</p>
                            <p class="text-center px-1">{{__('Deleted At')}} : {{$user->deleted_at}}</p>
                       </div>
                    </div>
                </div>
            </div>
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
