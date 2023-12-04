<?php

namespace App\Exports;

use App\Models\Instansi;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AkunBpsProvExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Get Mahasiswa instances and select specific columns
        $bpsprovs = Instansi::where('is_prov', 1)->get()->map(function ($bpsprov) {
            return [
                'Nama' => $bpsprov->nama,
                'Email' => $bpsprov->user->email,
                'Alamat' => $bpsprov->alamat_lengkap,
                'Kode Kabupaten/Kota' => $bpsprov->kode_kabkota
                // Add other columns you want to export
            ];
        });

        return $bpsprovs;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'Alamat Lengkap',
            'Kode Kabupaten/Kota'
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
