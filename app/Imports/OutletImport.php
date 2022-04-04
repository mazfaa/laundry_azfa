<?php

namespace App\Imports;

use App\Models\Outlet;
use Maatwebsite\Excel\Concerns\ToModel;

class OutletImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Outlet([
            'id' => $row[0],
            'name' => $row[1],
            'address' => $row[2],
            'phone' => $row[3],
            'created_at' => $row[4],
            'updated_at' => $row[5],
        ]);
    }
}
