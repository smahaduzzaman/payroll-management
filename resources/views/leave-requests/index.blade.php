@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Leave Requests</h2>

        <table class="mt-4 w-full">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 text-left">ID</th>
                    <th class="py-2 px-4 bg-gray-200 text-left">Employee</th>
                    <th class="py-2 px-4 bg-gray-200 text-left">Leave Category</th>
                    <th class="py-2 px-4 bg-gray-200 text-left">Start Date</th>
                    <th class="py-2 px-4 bg-gray-200 text-left">End Date</th>
                    <th class="py-2 px-4 bg-gray-200 text-left">Status</th>
                    <th class="py-2 px-4 bg-gray-200 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaveRequests as $leaveRequest)
                    <tr>
                        <td class="py-2 px-4">{{ $leaveRequest->id }}</td>
                        <td class="py-2 px-4">{{ $leaveRequest->employee->name }}</td>
                        <td class="py-2 px-4">{{ $leaveRequest->leaveCategory->name }}</td>
                        <td class="py-2 px-4">{{ $leaveRequest->start_date }}</td>
                        <td class="py-2 px-4">{{ $leaveRequest->end_date }}</td>
                        <td class="py-2 px-4">{{ ucfirst($leaveRequest->status) }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('leave-requests.edit', $leaveRequest) }}" class="text-blue-500 hover:underline mr-2">
                                Edit
                            </a>
                            <form action="{{ route('leave-requests.destroy', $leaveRequest) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this leave request?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
