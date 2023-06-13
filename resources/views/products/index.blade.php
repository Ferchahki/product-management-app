@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Product Listing</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-2">Add Product</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('products.index') }}" method="GET" class="mb-3">
            <div class="form-group d-flex">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name or description">
                <button type="submit" class="btn btn-primary ml-2">Search</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Size</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->size }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $products->appends(['search' => request('search')])->links() }}
    </div>
@endsection