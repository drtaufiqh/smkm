<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AkunMahasiswaExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Get Mahasiswa instances and select specific columns
        $mahasiswas = Mahasiswa::all()->map(function ($mahasiswa) {
            return [
                'Nama' => $mahasiswa->nama,
                'NIM' => $mahasiswa->nim,
                'Email' => $mahasiswa->email,
                'Jenis Kelamin' => $mahasiswa->jenis_kelamin,
                'Kelas' => $mahasiswa->kelas,
                // Add other columns you want to export
            ];
        });

        return $mahasiswas;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama',
            'NIM',
            'Email',
            'Jenis Kelamin',
            'Kelas'
            // Add other header columns
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style all rows to apply borders
            1 => [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ],
        ];
    }
}
