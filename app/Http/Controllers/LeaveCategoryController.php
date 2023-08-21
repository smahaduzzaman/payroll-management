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

    // Add other methods (create, store, edit, update, destroy) as needed
}
