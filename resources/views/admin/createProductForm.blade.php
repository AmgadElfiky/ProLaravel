@extends('layouts.admin')

@section('body')

<div class="container">
    <div class="row  mb-5">
        <div class="col-md-5">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <li>{!! print_r($errors->all()) !!}</li>
        </ul>
    </div>
    @endif


    <h2 style="margin-top: 20px">Create New Product</h2>
    <form action="/admin/sendCreateProductForm" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required>
        </div>
        <div class="form-group">
            <label for="name">Description</label>
            <input type="text" class="form-control" name="description" id="Description" placeholder="Description"  required>
        </div>
        <div class="form-group">
            <label for="name">Image</label>
            <input type="file" class="" name="image" id="image" required>
        </div>
        <div class="form-group">
            <label for="name">Type</label>
            <input type="text" class="form-control" name="type" id="type" placeholder="type" required>
        </div>
        <div class="form-group">
            <label for="name">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="price" required>
        </div>
        <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
    </form>
</div>
</div>
</div>
@endsection
