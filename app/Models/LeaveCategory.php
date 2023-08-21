<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveCategory extends Model
{
    protected $fillable = ['name'];

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
