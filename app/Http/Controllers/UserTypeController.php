<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    public function index()
    {
        $userTypes = UserType::all();
        return view('user-types.index', compact('userTypes'));
    }

    // Add other methods (create, store, edit, update, destroy) as needed

    public function create()
    {
        return view('user-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:user_types',
        ]);

        UserType::create($request->all());

        return redirect()->route('user-types.index')
            ->with('success', 'User Type created successfully.');
    }

    public function edit(UserType $userType)
    {
        return view('user-types.edit', compact('userType'));
    }

    public function update(Request $request, UserType $userType)
    {
        $request->validate([
            'name' => 'required|unique:user_types,name,' . $userType->id,
        ]);

        $userType->update($request->all());

        return redirect()->route('user-types.index')
            ->with('success', 'User Type updated successfully');
    }

    public function destroy(UserType $userType)
    {
        $userType->delete();

        return redirect()->route('user-types.index')
            ->with('success', 'User Type deleted successfully');
    }
}

