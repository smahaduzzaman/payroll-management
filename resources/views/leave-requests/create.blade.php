@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Create New Leave Request</h2>

        <form action="{{ route('leave-requests.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="employee_id" class="block font-semibold mb-1">Employee:</label>
                <select name="employee_id" id="employee_id" class="w-full p-2 border rounded-md">
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="leave_category_id" class="block font-semibold mb-1">Leave Category:</label>
                <select name="leave_category_id" id="leave_category_id" class="w-full p-2 border rounded-md">
                    @foreach($leaveCategories as $leaveCategory)
                        <option value="{{ $leaveCategory->id }}">{{ $leaveCategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="start_date" class="block font-semibold mb-1">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="w-full p-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="end_date" class="block font-semibold mb-1">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="w-full p-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="reason" class="block font-semibold mb-1">Reason:</label>
                <textarea name="reason" id="reason" class="w-full p-2 border rounded-md"></textarea>
            </div>
            <div class="mb-4">
                <label for="status" class="block font-semibold mb-1">Status:</label>
                <select name="status" id="status" class="w-full p-2 border rounded-md">
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Create Leave Request</button>
        </form>
    </div>
@endsection
