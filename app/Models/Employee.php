<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['user_type_id', 'name', 'email', 'leave_balance'];

    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
