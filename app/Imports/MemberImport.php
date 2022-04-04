<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;

class MemberImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Member([
            'id' => $row[0],
            'name' => $row[1],
            'address' => $row[2],
            'gender' => $row[3],
            'phone' => $row[4],
            'created_at' => $row[5],
            'updated_at' => $row[6],
        ]);
    }
}
