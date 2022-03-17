<?php

namespace App\Exports;

use App\Models\Package;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;

class PackageExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Package::where('outlet_id', auth()->user()->id_outlet)->get();
    }

    public function headings (): array {
        return ['No.', 'Id Outlet', 'Jenis', 'Nama Paket', 'Harga', 'Tanggal Input', 'Tanggal Update'];
    }

    public function registerEvent (): array {
        return [AfterSheett::class => function (AfterSheet $event) {
            $event->sheet->getColumnDimension('A')->setAutoSize(true);
            $event->sheet->getColumnDimension('B')->setAutoSize(true);
            $event->sheet->getColumnDimension('C')->setAutoSize(true);
            $event->sheet->getColumnDimension('D')->setAutoSize(true);
            $event->sheet->getColumnDimension('E')->setAutoSize(true);
            $event->sheet->getColumnDimension('F')->setAutoSize(true);
            $event->sheet->getColumnDimension('G')->setAutoSize(true);

            $event->sheet->insertNewRowBefore(1, 2);
            $event->sheet->mergeCells('A1:G1');
            $event->sheet->setCellValue('A1', 'Data Paket Cucian');
            $event->sheet->getStyle('A1')->getFont()->setBold(true);
            $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $event->sheet->getStyle('A3:G', $event->sheet->getHighestRow())->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000']
                    ]
                ]
            ]);
        }];
    }
}
