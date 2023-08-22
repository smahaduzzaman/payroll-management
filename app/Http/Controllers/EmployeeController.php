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

    public function store(Request $request)
    {
        $request->validate([
            'user_type_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'leave_balance' => 'required',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $userTypes = UserType::all();
        return view('employees.edit', compact('employee', 'userTypes'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'user_type_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'leave_balance' => 'required',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }

}
