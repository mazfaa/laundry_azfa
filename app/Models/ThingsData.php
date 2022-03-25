<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThingsData extends Model
{
    use HasFactory;

    protected $fillable = ['things_name', 'qty', 'price', 'pay_date', 'supplier', 'things_status', 'updated_status_date'];
}
