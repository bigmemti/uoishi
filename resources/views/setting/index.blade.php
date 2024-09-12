<x-app-layout>

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__("Settings")}} :
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
                                    <th class="text-center text-sm md:text-base lg:text-lg xl:text-xl">{{__("Title")}}</th>
                                    <th class="text-center text-sm md:text-base lg:text-lg xl:text-xl">{{__("Value")}}</th>
                                    <th class="text-center text-sm md:text-base lg:text-lg xl:text-xl">{{__("Action")}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($settings as $setting)

                                    <tr class="border-b-2 border-b-gray-400 text-xl" x-data>
                                        <form action="{{route('setting.update',['setting' => $setting])}}" method="post">
                                            <td class="text-center font-semibold">
                                                <label for="vaule-{{$setting->id}}">{{$setting->id}}</label>
                                            </td>
                                            <td class="text-center">
                                                <label for="vaule-{{$setting->id}}">{{$setting->name}}</label>
                                            </td>
                                            <td class="text-center">
                                                <label for="vaule-{{$setting->id}}">{{__($setting->title)}}</label>
                                            </td>
                                            <td class="text-center">
                                                <input class="hover:cursor-pointer" type="text" value="{{$setting->value}}" name="value" id="vaule-{{$setting->id}}">
                                            </td>
                                            <td class="text-center">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="w-18 ring-2 ring-transparent px-3 py-2 text-center rounded-lg
                                                    bg-yellow-500 text-white hover:bg-yellow-300 active:ring-yellow-200 active:bg-yellow-300 my-2">
                                                    <i class="fa-solid fa-edit"></i>
                                                </button>
                                            </td>
                                        </form>
                                    </tr>

                                @empty

                                    <tr class="border-b-2 border-b-gray-400 text-xl">
                                        <td colspan="4" class="text-center text-gray-600 cursor-pointer text-2xl
                                            hover:text-gray-300  hover:bg-gray-700 transition-all duration-300">
                                            <p class="my-2 text-sm md:text-base lg:text-lg xl:text-xl">
                                                {{__("there is no setting.")}}
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
