<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absenteeism extends Model
{
    use HasFactory;

    protected $fillable = ['employee_name', 'signin_date', 'signin_time', 'status', 'time_to_finish_work'];
}
