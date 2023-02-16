@extends('layouts.admin.main')

@php
    $product = $product ?? null;
@endphp
@section('title', $product ? 'Editing product' : 'Create new product')

@section('content')
    <h1>
        @if($product)
            Editing {{$product->name}}
        @else
            Creating new product
        @endif
    </h1>
    <span>
        @if($product)
            Redagavimo forma
        @else
            Sukūrimo forma
        @endif
    </span>

        <form action="{{route('products.store')}}" method="post">

        <input type="text" name="name" placeholder="Name" value="{{old('name') ?? $product?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="slug" placeholder="Slug" value="{{old('slug') ?? $product?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="description" placeholder="Description" value="{{old('description') ?? $product?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="image" placeholder="Image" value="{{old('image') ?? $product?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="category_id" placeholder="Category ID" value="{{old('category_id') ?? $product?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="color" placeholder="Color" value="{{old('color') ?? $product?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="size" placeholder="Size" value="{{old('size') ?? $product?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="price" placeholder="Price" value="{{old('price') ?? $product?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="status_id" placeholder="Status ID" value="{{old('status_id') ?? $product?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="Sukurti naują įrašą">
        @csrf
        </form>
@endsection
