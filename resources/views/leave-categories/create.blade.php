@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Create New Leave Category</h2>

        <form action="{{ route('leave-categories.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">Name:</label>
                <input type="text" name="name" id="name" class="w-full p-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="description" class="block font-semibold mb-1">Description:</label>
                <input type="text" name="description" id="description" class="w-full p-2 border rounded-md">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Create Leave Category</button>
        </form>
    </div>
@endsection
