<?php

namespace App\Http\Controllers;

use App\Models\LeaveCategory;
use Illuminate\Http\Request;

class LeaveCategoryController extends Controller
{
    public function index()
    {
        $leaveCategories = LeaveCategory::all();
        return view('leave-categories.index', compact('leaveCategories'));
    }

    public function create()
    {
        return view('leave-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:leave_categories,name',
            'description' => 'required',
        ]);

        LeaveCategory::create($request->all());

        return redirect()->route('leave-categories.index')
            ->with('success', 'Leave category created successfully.');
    }

    public function edit(LeaveCategory $leaveCategory)
    {
        return view('leave-categories.edit', compact('leaveCategory'));
    }

    public function update(Request $request, LeaveCategory $leaveCategory)
    {
        $request->validate([
            'name' => 'required|unique:leave_categories,name,' . $leaveCategory->id,
            'description' => 'required',
        ]);

        $leaveCategory->update($request->all());

        return redirect()->route('leave-categories.index')
            ->with('success', 'Leave category updated successfully');
    }

    public function destroy(LeaveCategory $leaveCategory)
    {
        $leaveCategory->delete();

        return redirect()->route('leave-categories.index')
            ->with('success', 'Leave category deleted successfully');
    }

    public function show(LeaveCategory $leaveCategory)
    {
        return view('leave-categories.show', compact('leaveCategory'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $leaveCategories = LeaveCategory::where('name', 'like', '%' . $search . '%')->paginate(5);
        return view('leave-categories.index', compact('leaveCategories'));
    }

}
