<?php

namespace App\Exports;

use App\Models\Absenteeism;
// use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AbsenteeismExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Absenteeism::all();
    }

    // public function headings(): array 
    // {
    //     return ['No', 'Nama Karyawan', 'Tanggal Masuk', 'Waktu Masuk', 'Status', 'Waktu Selesai Kerja', 'Tanggal Input', 'Tanggal Update'];
    // }
}