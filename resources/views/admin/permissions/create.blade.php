<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{route('admin.permissions.store')}}"  class="w-full">
                        @csrf
                        <div  class="flex flex-col w-full my-5">
                            <label for="name" class="text-gray-500 mb-2">New Permission</label>
                            <input type="text" name="name"
                                class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg"
                            />
                            <ul class="text-sm text-red-600">
                               @error('name')
                                    <li>{{$message}}</li>
                                @enderror
                            </ul>
                        </div>
                        <div id="button" class="flex flex-col my-5">
                            <button type="submit" class="w-full py-4 bg-green-600 rounded-lg text-green-100">
                                <div class="flex flex-row items-center justify-center">
                                    <div class="font-bold">Create</div>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
