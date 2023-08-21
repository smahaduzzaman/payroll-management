@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Leave Categories</h2>

        <a href="{{ route('leave-categories.create') }}" class="bg-blue-900 hover:bg-blue-600 text-white py-2 px-4 rounded-md">
            Create New Leave Category
        </a>

        <table class="mt-4 w-full">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 text-left">ID</th>
                    <th class="py-2 px-4 bg-gray-200 text-left">Name</th>
                    <th class="py-2 px-4 bg-gray-200 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaveCategories as $leaveCategory)
                    <tr>
                        <td class="py-2 px-4">{{ $leaveCategory->id }}</td>
                        <td class="py-2 px-4">{{ $leaveCategory->name }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('leave-categories.edit', $leaveCategory) }}" class="text-blue-500 hover:underline mr-2">
                                Edit
                            </a>
                            <form action="{{ route('leave-categories.destroy', $leaveCategory) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this leave category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
