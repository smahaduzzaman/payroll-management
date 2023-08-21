@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">User Types</h2>

        <a href="{{ route('user-types.create') }}" class="bg-blue-900 hover:bg-blue-600 text-white py-2 px-4 rounded-md">
            Create New User Type
        </a>

        <table class="mt-4 w-full table-striped">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 text-left">ID</th>
                    <th class="py-2 px-4 bg-gray-200 text-left">Name</th>
                    <th class="py-2 px-4 bg-gray-200 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userTypes as $userType)
                    <tr>
                        <td class="py-2 px-4">{{ $userType->id }}</td>
                        <td class="py-2 px-4">{{ $userType->name }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('user-types.edit', $userType) }}" class="text-blue-500 hover:underline mr-2">
                                Edit
                            </a>
                            <form action="{{ route('user-types.destroy', $userType) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this user type?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
