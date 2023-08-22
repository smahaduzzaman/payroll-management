@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Employee Details</h2>

        <div class="mb-4">
            <label class="block font-semibold mb-1">ID:</label>
            <p>{{ $employee->id }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Name:</label>
            <p>{{ $employee->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Email:</label>
            <p>{{ $employee->email }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">User Type:</label>
            <p>{{ $employee->userType->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Leave Balance:</label>
            <p>{{ $employee->leave_balance }}</p>
        </div>
        <a href="{{ route('employees.edit', $employee) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">
            Edit Employee
        </a>
    </div>
@endsection
