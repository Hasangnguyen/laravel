@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Chỉnh sửa sản phẩm</h2>
    <form action="{{ route('products.update', $product['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $product['name'] }}" required class="form-control mb-3">
        <textarea name="description" class="form-control mb-3">{{ $product['description'] ?? 'Không có thông tin'}}</textarea>
        <input type="number" name="price" value="{{ $product['price'] ?? 0, 2}}" required class="form-control mb-3">
        <input type="number" name="quantity" value="{{ $product['quantity'] ?? 0 }}" required class="form-control mb-3">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection