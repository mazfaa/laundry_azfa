<?php

namespace App\Imports;

use App\Models\Absenteeism;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsenteeismImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Absenteeism([
            'id' => $row[0],
            'employee_name' => $row[1],
            'signin_date' => $row[2],
            'signin_time' => $row[3],
            'status' => $row[4],
            'time_to_finish_work' => $row[5],
            'created_at' => $row[6],
            'updated_at' => $row[7],
        ]);
    }
}
