<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{route('products.update', $product)}}"  class="w-full" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div  class="flex flex-col w-full my-5">
                            <label for="name" class="text-gray-500 mb-2">Name</label>
                            <input type="text" name="name" value="{{$product->name}}"
                                class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg"
                            />
                            <ul class="text-sm text-red-600">
                                @if($errors->has('name'))
                                    <li>{{$errors->first('name')}}</li>
                                @endif
                            </ul>
                        </div>
                        <div  class="flex flex-col w-full my-5">
                            <label for="category" class="text-gray-500 mb-2">Choose a category</label>
                            <select type="text" name="category_id"
                                    class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg">
                                @foreach($categories as $id=>$category)
                                    <option value="{{$id}}" @if($id == $product->category?->id) {{'selected'}} @endif>{{$category}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div  class="flex flex-col w-full my-5">
                            <label for="brand" class="text-gray-500 mb-2">Choose a brand</label>
                            <select type="text" name="brand_id"
                                    class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg">
                                @foreach($brands as $id=>$brand)
                                    <option value="{{$id}}" @if($id == $product->brand?->id) {{'selected'}} @endif>{{$brand}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div  class="flex flex-col w-full my-5">
                            <label for="name" class="text-gray-500 mb-2">Price</label>
                            <input type="text" name="price" value="{{$product->price}}"
                                   class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg"
                            />
                            <ul class="text-sm text-red-600">
                                @if($errors->has('price'))
                                <li>{{$errors->first('price')}}</li>
                                @endif
                            </ul>
                        </div>
                        <div  class="flex flex-col w-full my-5">
                            <label for="name" class="text-gray-500 mb-2">Sku</label>
                            <input type="text" name="sku" value="{{$product->sku}}"
                                   class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg"
                            />
                            <ul class="text-sm text-red-600">
                                @if($errors->has('sku'))
                                    <li>{{$errors->first('sku')}}</li>
                                @endif
                            </ul>
                        </div>
                        <div  class="flex flex-col w-full my-5">
                            <label for="name" class="text-gray-500 mb-2">Description</label>
                            <input type="text" name="description" value="{{$product->description}}"
                                   class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg"
                            />
                            <ul class="text-sm text-red-600">
                                @if($errors->has('description'))
                                    <li>{{$errors->first('description')}}</li>
                                @endif
                            </ul>
                        </div>
                        <div  class="flex flex-col w-full my-5">
                            <label for="name" class="text-gray-500 mb-2">image</label>
                            <input type="file" name="image"
                                   class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg"
                            />
                            <ul class="text-sm text-red-600">
                                @if($errors->has('images'))
                                    <li>{{$errors->first('images')}}</li>
                                @endif
                            </ul>
                        </div>
                            <button type="submit" class="w-full py-4 bg-green-600 rounded-lg text-green-100">
                                <div class="flex flex-row items-center justify-center">
                                    <div class="font-bold">Update</div>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
