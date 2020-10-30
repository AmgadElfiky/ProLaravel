@extends('layouts.admin')

@section('body')

<div class="table-responsive">
    <h1 class="page-header" style="margin-top: 20px">Dashboard</h1>
    <table class="table table-striped">
        <thead>
            <tr >
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Price</th>
                <th>Edit Image</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product['id']}}</td>
                    <td><img src="{{asset('storage')}}/product_images/{{$product['image']}}" alt="{{asset('storage')}}/{{$product['image']}}" width="100" height="100" style="max-height: 220px"></td>
                    <td>{{$product['name']}}</td>
                    <td>{{$product['description']}}</td>
                    <td>{{$product['type']}}</td>
                    <td>${{$product['price']}}</td>
                    <td><a href = "{{route ('adminEditProductImageForm', ['id' => $product['id'] ])}}" class="btn btn-light btn-outline-dark">Edit Image</a></td>
                    <td><a href = "{{route ('adminEditProductForm', ['id' => $product['id'] ])}}" class="btn btn-outline-success ">Edit</a></td>
                    <td><a href = "{{route ('adminDeleteProduct', ['id' => $product['id'] ])}}" class="btn btn-outline-danger">Remove</a></td>
                </tr>

            @endforeach

        </tbody>
    </table>

    {{$products->links()}}

</div>

@endsection
