<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        // Fetch data from the database
        $data = User::get(['id', 'name', 'email', 'no_hp', 'alamat']);

        // Reindex the collection starting from 1
        $data = $data->values()->map(function ($item, $key) {
            $item['id'] = $key + 1;
            return $item;
        });

        return $data;
    }

    public function headings(): array
    {
        return ['#', 'Nama', 'Email', 'No Hp', 'Alamat'];
    }

    public function styles(Worksheet $sheet)
    {
        // Apply borders to all cells
        $cellRange = 'A1:E' . $sheet->getHighestRow();
        $sheet->getStyle($cellRange)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        // Center align header and make it bold
        $sheet->getStyle('A1:E1')->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'bold' => true,
            ],
        ]);

        // Justify left align data
        $sheet->getStyle('A2:E' . $sheet->getHighestRow())->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
            ],
        ]);
    }
}
