<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-right"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 mb-2 border border-blue-500 rounded">
                            <a href="{{route('admin.roles.create')}}">New Role</a></button></div>
                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">ID</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Name</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Permission</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
                        </tr>
                        </thead>
                        @foreach($roles as $role)
                            <tbody class="block md:table-row-group">
                            <tr class="border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{$role->id}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Name</span>{{$role->name}}</td>
                                    <td class="p-2 md:border md:border-grey-500 md:table-cell">
                                        @forelse($role->permissions as $rp)
                                            <span class="inline-block p-1 mx-1 bg-indigo-300 rounded text-sm">{{$rp->name}}</span>
                                        @empty
                                            <span class=" p-1 mx-2 text-sm text-gray-300 inline-block w-1/3 ">No Permission</span>
                                        @endforelse
                                    </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                                        <a href="{{route('admin.roles.edit', $role)}}">Edit</a></button>
                                    <div class="inline-block">
                                        <form action="{{route('admin.roles.destroy', $role)}}" method="post">
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

