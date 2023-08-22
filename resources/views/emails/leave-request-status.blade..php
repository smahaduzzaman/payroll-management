<!DOCTYPE html>
<html>

<head>
    <title>Leave Request Status</title>
</head>

<body>
    <p>Your leave request has been {{ $status }}.</p>
    <h2>Leave Request Details:</h2>
    <table>
        <tr>
            <th>Employee</th>
            <th>Leave Category</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Reason</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>{{ $leaveRequest->employee->name }}</td>
            <td>{{ $leaveRequest->leaveCategory->name }}</td>
            <td>{{ $leaveRequest->start_date }}</td>
            <td>{{ $leaveRequest->end_date }}</td>
            <td>{{ $leaveRequest->reason }}</td>
            <td>{{ $leaveRequest->status }}</td>
        </tr>
    </table>
    <p>Thanks</p>
</body>

</html>
