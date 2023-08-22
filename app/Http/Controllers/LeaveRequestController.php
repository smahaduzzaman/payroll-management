<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Employee;
use App\Models\LeaveCategory;
use Illuminate\Http\Request;
use App\Mail\LeaveRequestStatus;
use Illuminate\Support\Facades\Mail;

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

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'leave_category_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required',
            'status' => 'required',
        ]);

        LeaveRequest::create($request->all());

        return redirect()->route('leave-requests.index')
        ->with('success', 'Leave request created successfully.');
    }

    public function show(LeaveRequest $leaveRequest)
    {
        return view('leave-requests.show', compact('leaveRequest'));
    }

    public function edit(LeaveRequest $leaveRequest)
    {
        $employees = Employee::all();
        $leaveCategories = LeaveCategory::all();
        return view('leave-requests.edit', compact('leaveRequest', 'employees', 'leaveCategories'));
    }

    public function update(Request $request, LeaveRequest $leaveRequest)
    {
        $request->validate([
            'employee_id' => 'required',
            'leave_category_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required',
            'status' => 'required',
        ]);

        $leaveRequest->update($request->all());

        return redirect()->route('leave-requests.index')
        ->with('success', 'Leave request updated successfully');
    }

    public function destroy(LeaveRequest $leaveRequest)
    {
        $leaveRequest->delete();

        return redirect()->route('leave-requests.index')
        ->with('success', 'Leave request deleted successfully');
    }

    public function approve(LeaveRequest $leaveRequest)
    {
        $leaveRequest->update(['status' => 'approved']);
        Mail::to($leaveRequest->employee->email)->send(new LeaveRequestStatus('approved'));
        redirect()->back()->with('message', 'Leave request approved successfully');
    }

    public function reject(LeaveRequest $leaveRequest)
    {
        $leaveRequest->update(['status' => 'rejected']);
        Mail::to($leaveRequest->employee->email)->send(new LeaveRequestStatus('rejected'));
        redirect()->back()->with('message', 'Leave request rejected successfully');
    }

    public function cancel(LeaveRequest $leaveRequest)
    {
        $leaveRequest->update(['status' => 'cancelled']);
        Mail::to($leaveRequest->employee->email)->send(new LeaveRequestStatus('cancelled'));
        redirect()->back()->with('message', 'Leave request cancelled successfully');
    }
}

