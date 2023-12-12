<?php

namespace App\Exports;

use App\Models\KartuMonitoring;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KartuMonitoringExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        // Fetch data from the database
        $data = KartuMonitoring::get([
            'id',
            'nama_lengkap',
            'nik_pemohon',
            'no_hp',
            'alamat',
            'created_at',
            'no_antrian',
        ]);

        // Reindex the collection starting from 1
        $data = $data->values()->map(function ($item, $key) {
            $item['id'] = $key + 1;
            return $item;
        });

        return $data;
    }

    public function headings(): array
    {
        return ['#', 'Nama Lengkap', 'Nik Pemohon', 'No Hp', 'Alamat', 'Tanggal', 'No Antrian'];
    }

    public function styles(Worksheet $sheet)
    {
        // Apply borders to all cells
        $cellRange = 'A1:G' . $sheet->getHighestRow();
        $sheet->getStyle($cellRange)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        // Center-align the header
        $headerRange = 'A1:G1';
        $sheet
            ->getStyle($headerRange)
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Left-justify the data
        $dataRange = 'A2:G' . $sheet->getHighestRow();
        $sheet
            ->getStyle($dataRange)
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // Make the header bold
        $sheet
            ->getStyle($headerRange)
            ->getFont()
            ->setBold(true);
    }
}
