@extends('layout')
@section('content')
    <h3>Product Form</h3>
    <form @if (@isset($product)) action="/product/{{ $product->id }}"
@else action="/product" @endif
        method="post">
        @csrf
        @if (@isset($product))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name ?? '' }}">
        </div>
        <div class="form-group mt-3">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" value="{{ $product->price ?? '' }}">
        </div>
        <div class="form-group mt-3">
            <label for="price">Qty</label>
            <input type="text" name="qty" class="form-control" value="{{ $product->qty ?? '' }}">
        </div>
        <div class="form-group mt-3">
            <label for="price">Detail</label>
            <input type="text" name="detail" class="form-control" value="{{ $product->detail ?? '' }}">
        </div>
        <div class="form-group mt-3">
            <label for="price">Type</label>
            <select name="type" class="form-control">
                @foreach ($productTypes as $productType)
                    <option value="{{ $productType->id }}"
                        @if (isset($product)) @if ($product->product_type_id == $productType->id)
                selected @endif
                        @endif
                        >
                        {{ $productType->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">
            <i class="fa fa-save"></i>
            Save
        </button>
    </form>
