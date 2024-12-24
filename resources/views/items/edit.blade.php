@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Item</h1>

    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="item_name">Item Name</label>
            <input type="text" id="nitem_name" name="item_name" class="form-control" value="{{ old('item_name', $item->item_name) }}" required>
        </div>

        <div class="form-group">
            <label for="item_description">Description</label>
            <textarea id="item_description" name="item_description" class="form-control">{{ old('item_description', $item->item_description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $item->price) }}" required>
        </div>

        <div class="form-group">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category }}" 
                    @if($item->category == $category) selected @endif>
                    {{ $category }}
                </option>
            @endforeach
        </select>
    </div>

        <!-- Item Location (Dropdown) -->
    <div class="form-group">
        <label for="location">Location</label>
        <select name="location" id="location" class="form-control" required>
            <option value="">Select Location</option>
            @foreach($locations as $location)
                <option value="{{ $location }}" 
                    @if($item->location == $location) selected @endif>
                    {{ $location }}
                </option>
            @endforeach
        </select>
    </div>

        <!-- Item Image -->
    <div class="form-group">
        <label for="item_image">Image</label>
        <input type="file" name="item_image" id="item_image" class="form-control">
    </div>

        <button type="submit" class="btn btn-success">Update Item</button>
    </form>
</div>
@endsection