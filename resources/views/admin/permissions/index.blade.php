<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-right"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 mb-2 border border-blue-500 rounded">
                            <a href="{{route('admin.permissions.create')}}">New Permission</a></button></div>
                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">ID</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Name</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
                        </tr>
                        </thead>
                        @foreach($permissions as $permission)
                            <tbody class="block md:table-row-group">
                            <tr class="border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{$permission->id}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Name</span>{{$permission->name}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                                        <a href="{{route('admin.permissions.edit', $permission)}}">Edit</a></button>
                                    <div class="inline-block">
                                        <form action="{{route('admin.permissions.destroy', $permission)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

