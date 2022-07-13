<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can('create', App\Models\Product::class)
                        <div class="text-right"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 mb-2 border border-blue-500 rounded">
                                <a href="{{route('products.create')}}">New Product</a></button></div>
                    @endcan
                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">ID</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Name</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Category</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Brand</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Image</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">SKU</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Price</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Description</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
                        </tr>
                        </thead>
                        @foreach($products as $product)
                            <tbody class="block md:table-row-group">
                            <tr class="border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{$product->id}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Name</span>{{$product->name}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Name</span>{{$product->category?->name}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Name</span>{{$product->brand?->name}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Image</span><img class="object-cover h-10 w-full" src="{{asset('images/'.($product->image ?? 'no-image.png'))}}" alt="image"></td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Sku</span>{{$product->sku}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Price</span>{{$product->price}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Description</span>{{Str::limit($product->description,35,'...')}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                                    @can('update', $product)
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                                        <a href="{{route('products.edit', $product)}}">Edit</a></button>
                                    <div class="inline-block">
                                        @endcan
                                        @can('delete', $product)
                                        <form action="{{route('products.destroy', $product)}}" method="post">
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
        </div>
    </div>
</x-app-layout>
