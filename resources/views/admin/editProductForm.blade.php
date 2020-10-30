@extends('layouts.admin')

@section('body')

<div class="container">
    <div class="row  mb-5">
        <div class="col-md-5">
    <h2 style="margin-top: 20px">Edit Product</h2>
    <form action="/admin/updateProduct/{{$product->id}}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" value="{{$product->name}}" required>
        </div>
        <div class="form-group">
            <label for="name">Description</label>
            <input type="text" class="form-control" name="description" id="Description" placeholder="Description" value="{{$product->description}}" required>
        </div>
        <div class="form-group">
            <label for="name">Type</label>
            <input type="text" class="form-control" name="type" id="type" placeholder="type" value="{{$product->type}}" required>
        </div>
        <div class="form-group">
            <label for="name">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="price" value="{{$product->price}}" required>
        </div>
        <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
    </form>
</div>
</div>
</div>
@endsection
