@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Leave Category Details</h2>

        <div class="mb-4">
            <label class="block font-semibold mb-1">ID:</label>
            <p>{{ $leaveCategory->id }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Name:</label>
            <p>{{ $leaveCategory->name }}</p>
        </div>
        <a href="{{ route('leave-categories.edit', $leaveCategory) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">
            Edit Leave Category
        </a>
    </div>
@endsection
