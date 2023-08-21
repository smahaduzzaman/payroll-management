<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Employee;
use App\Models\LeaveCategory;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaveRequests = LeaveRequest::all();
        return view('leave-requests.index', compact('leaveRequests'));
    }

    public function create()
    {
        $employees = Employee::all();
        $leaveCategories = LeaveCategory::all();
        return view('leave-requests.create', compact('employees', 'leaveCategories'));
    }

    // Add other methods (store, show, edit, update, destroy) as needed
}

