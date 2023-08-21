@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Edit User Type</h2>

        <form action="{{ route('user-types.update', $userType) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">Name:</label>
                <input type="text" name="name" id="name" class="w-full p-2 border rounded-md" value="{{ $userType->name }}">
            </div>
            <button type="submit" class="bg-blue-900 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Update User Type</button>
        </form>
    </div>
@endsection
