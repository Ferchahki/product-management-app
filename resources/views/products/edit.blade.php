@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required>{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" name="size" id="size" class="form-control" value="{{ $product->size }}" required>
            </div>
            <!-- Add other product fields here -->
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection