<?php

namespace App\Imports;

use App\Models\Package;
use Maatwebsite\Excel\Concerns\ToModel;

class PackageImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Package([
            'id' => $row[0],
            'outlet_id' => $row[1],
            'type' => $row[2],
            'package_name' => $row[3],
            'price' => $row[4],
            'created_at' => $row[5],
            'updated_at' => $row[6],
        ]);
    }
}
