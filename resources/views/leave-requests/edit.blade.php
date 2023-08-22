@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Edit Leave Request</h2>

        <form action="{{ route('leave-requests.update', $leaveRequest) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="employee_id" class="block font-semibold mb-1">Employee:</label>
                <select name="employee_id" id="employee_id" class="w-full p-2 border rounded-md">
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ $employee->id == $leaveRequest->employee_id ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="leave_category_id" class="block font-semibold mb-1">Leave Category:</label>
                <select name="leave_category_id" id="leave_category_id" class="w-full p-2 border rounded-md">
                    @foreach($leaveCategories as $leaveCategory)
                        <option value="{{ $leaveCategory->id }}" {{ $leaveCategory->id == $leaveRequest->leave_category_id ? 'selected' : '' }}>
                            {{ $leaveCategory->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="start_date" class="block font-semibold mb-1">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="w-full p-2 border rounded-md" value="{{ $leaveRequest->start_date }}">
            </div>
            <div class="mb-4">
                <label for="end_date" class="block font-semibold mb-1">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="w-full p-2 border rounded-md" value="{{ $leaveRequest->end_date }}">
            </div>
            <div class="mb-4">
                <label for="reason" class="block font-semibold mb-1">Reason:</label>
                <textarea name="reason" id="reason" class="w-full p-2 border rounded-md">{{ $leaveRequest->reason }}</textarea>
            </div>
            <div class="mb-4">
                <label for="status" class="block font-semibold mb-1">Status:</label>
                <select name="status" id="status" class="w-full p-2 border rounded-md">
                    <option value="pending" {{ $leaveRequest->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $leaveRequest->status === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $leaveRequest->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Update Leave Request</button>
        </form>
    </div>
@endsection
