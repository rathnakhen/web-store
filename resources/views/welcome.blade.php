@foreach($products as $product)
    <label for="product">Product Name</label>
    <h1>{{$product->name}}</h1>
    <label for="category">Category Name</label>
    <h3>{{$product->category?->name}}</h3>
    <label for="brand">Brand Name</label>
    <h3>{{$product->brand?->name}}</h3>
@endforeach
{{$products->links()}}
