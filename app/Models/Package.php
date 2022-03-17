<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PackageExport;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'outlet_id', 'package_name', 'price'];
}
