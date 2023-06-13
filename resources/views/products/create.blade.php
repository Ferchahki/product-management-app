@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" name="size" id="size" class="form-control" required>
            </div>
            <!-- Add other product fields here -->
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection