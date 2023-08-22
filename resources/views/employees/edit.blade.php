@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Edit Employee</h2>

        <form action="{{ route('employees.update', $employee) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">Name:</label>
                <input type="text" name="name" id="name" class="w-full p-2 border rounded-md" value="{{ $employee->name }}">
            </div>
            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">Email:</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded-md" value="{{ $employee->email }}">
            </div>
            <div class="mb-4">
                <label for="user_type_id" class="block font-semibold mb-1">User Type:</label>
                <select name="user_type_id" id="user_type_id" class="w-full p-2 border rounded-md">
                    @foreach($userTypes as $userType)
                        <option value="{{ $userType->id }}" {{ $userType->id == $employee->user_type_id ? 'selected' : '' }}>
                            {{ $userType->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="leave_balance" class="block font-semibold mb-1">Leave Balance:</label>
                <input type="number" name="leave_balance" id="leave_balance" class="w-full p-2 border rounded-md" value="{{ $employee->leave_balance }}">
            </div>
            <button type="submit" class="bg-blue-900 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Update Employee</button>
        </form>
    </div>
@endsection
