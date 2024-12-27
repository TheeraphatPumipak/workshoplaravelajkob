@extends('layout')
@section('content')
    <h3>Product list</h3>
    <a href="/product/form" class="btn btn-primary">
        <i class="fa fa-plus"></i>
        Add Product
    </a>
    <form action="/product/search" method="POST">
        @csrf
        <div class="input-group mt-3">
            <input type="text" class="form-control " name="keyword" placeholder="Search Product">
            <button type="submit" class="btn btn-primary ">
                <i class="fa fa-search"></i>
                search
            </button>
        </div>
    </form>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <th>name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Detail</th>
            <th>Product_type</th>
            <th width="110px">Action</th>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>{{$product->productType->name}}</td>
                    <td>
                        <a href="/product/{{ $product->id }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i></a>
                        <a href="/product/remove/{{ $product->id }}" class="btn btn-danger">
                            <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
