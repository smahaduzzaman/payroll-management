<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\UserType;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $userTypes = UserType::all();
        return view('employees.create', compact('userTypes'));
    }

    // Add other methods (store, show, edit, update, destroy) as needed
}
