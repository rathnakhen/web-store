<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="relative mx-4 lg:mx-0">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <form action="/categories" method="GET">
                            <input class="w-32 pl-10 pr-4 rounded-md form-input sm:w-64 focus:border-indigo-600" type="text" placeholder="Search" name="search">
                            <button type="submit" class="bg-red-500 hover:bg-indigo-600 text-white font-bold py-1 px-2 border border-red-500 rounded">Search</button>
                        </form>
                    </div>
                    @can('product-create')
    <div class="text-right"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 mb-2 border border-blue-500 rounded">
            <a href="{{route('categories.create')}}">New Category</a></button></div>
                    @endcan
    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">ID</th>
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Name</th>
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
        </tr>
        </thead>
        @foreach($categories as $category)
        <tbody class="block md:table-row-group">
        <tr class="border border-grey-500 md:border-none block md:table-row">
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{$category->id}}</td>
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Name</span>{{$category->name}}</td>
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                @can('product-edit')
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                    <a href="{{route('categories.edit', $category)}}">Edit</a></button>
                <div class="inline-block">

                    @endcan
                    @can('product-delete')
                <form action="{{route('categories.destroy', $category)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                </form>
                    @endcan
            </div>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
                </div>
            </div>
            <div class="pt-4">
                {{$categories->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
