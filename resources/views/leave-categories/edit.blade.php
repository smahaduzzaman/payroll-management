@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Edit Leave Category</h2>

        <form action="{{ route('leave-categories.update', $leaveCategory) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">Name:</label>
                <input type="text" name="name" id="name" class="w-full p-2 border rounded-md" value="{{ $leaveCategory->name }}">
            </div>
            <div class="mb-4">
                <label for="description" class="block font-semibold mb-1">Description:</label>
                <input type="text" name="description" id="description" class="w-full p-2 border rounded-md" value="{{ $leaveCategory->description }}">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Update Leave Category</button>
        </form>
    </div>
@endsection
