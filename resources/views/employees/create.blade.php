@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Create New Employee</h2>

        <form action="{{ route('employees.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">Name:</label>
                <input type="text" name="name" id="name" class="w-full p-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">Email:</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="user_type_id" class="block font-semibold mb-1">User Type:</label>
                <select name="user_type_id" id="user_type_id" class="w-full p-2 border rounded-md">
                    @foreach($userTypes as $userType)
                        <option value="{{ $userType->id }}">{{ $userType->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-900 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Create Employee</button>
        </form>
    </div>
@endsection
