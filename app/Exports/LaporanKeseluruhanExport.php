<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class LaporanKeseluruhanExport implements
    FromCollection,
    WithMapping,
    WithStyles,
    WithCustomStartCell,
    ShouldAutoSize
{
    protected $data;
    protected $no = 1;
    protected $total = 0;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /* Mulai data di baris 8 (AMAN) */
    public function startCell(): string
    {
        return 'A8';
    }

    public function collection()
    {
        $rows = collect([

            [
                'nama'   => 'Layanan Ibu Hamil (ANC)',
                'jumlah' => $this->data['total_ibu_hamil'] ?? 0,
            ],

            [
                'nama'   => 'Layanan Ibu Bersalin',
                'jumlah' => $this->data['total_ibu_bersalin'] ?? 0,
            ],

            [
                'nama'   => 'Kesehatan Bayi Baru Lahir',
                'jumlah' => $this->data['total_bayi'] ?? 0,
            ],

            [
                'nama'   => 'Layanan HIV / AIDS',
                'jumlah' => $this->data['total_hiv'] ?? 0,
            ],

            [
                'nama'   => 'Register Terduga TBC',
                'jumlah' => $this->data['total_tbc'] ?? 0,
            ],

        ]);

        // Total
        $this->total = $rows->sum('jumlah');

        // Tambah baris total
        $rows->push([
            'nama'   => 'TOTAL',
            'jumlah' => $this->total,
        ]);

        return $rows;
    }

    public function map($row): array
    {
        if ($row['nama'] === 'TOTAL') {
            return [
                '',
                'TOTAL',
                $row['jumlah'] . ' Orang',
            ];
        }

        return [
            $this->no++,
            $row['nama'],
            $row['jumlah'] . ' Orang',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        /* ================= JUDUL ================= */

        $sheet->mergeCells('A1:C1');
        $sheet->setCellValue('A1', 'PUSKESMAS GADANG HANYAR');

        $sheet->mergeCells('A2:C2');
        $sheet->setCellValue('A2', 'LAPORAN REKAP DATA KESEHATAN');

        $sheet->mergeCells('A3:C3');
        $sheet->setCellValue(
            'A3',
            'Tanggal: ' . ($this->data['tanggal'] ?? date('d F Y'))
        );

        $sheet->getStyle('A1:A3')->applyFromArray([

            'font' => [
                'bold' => true,
                'size' => 14,
            ],

            'alignment' => [
                'horizontal' => 'center',
            ],

        ]);

        /* ================= HEADER ================= */

        $sheet->setCellValue('A7', 'No');
        $sheet->setCellValue('B7', 'Kategori Laporan');
        $sheet->setCellValue('C7', 'Jumlah Pasien');

        $sheet->getStyle('A7:C7')->applyFromArray([

            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],

            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4E73DF'],
            ],

            'alignment' => [
                'horizontal' => 'center',
                'vertical'   => 'center',
            ],

        ]);

        /* ================= BORDER ================= */

        $sheet->getStyle("A7:C{$lastRow}")->applyFromArray([

            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],

        ]);

        /* ================= ALIGN ================= */

        // Kolom No
        $sheet->getStyle("A8:A{$lastRow}")
              ->getAlignment()
              ->setHorizontal('center');

        // Kolom Jumlah
        $sheet->getStyle("C8:C{$lastRow}")
              ->getAlignment()
              ->setHorizontal('center');

        /* ================= TOTAL ================= */

        $sheet->getStyle("A{$lastRow}:C{$lastRow}")->applyFromArray([

            'font' => [
                'bold' => true,
            ],

            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FFF3CD'],
            ],

        ]);

        /* ================= PRINT ================= */

        $sheet->getPageSetup()
              ->setOrientation(
                  \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT
              );

        $sheet->getPageSetup()->setFitToWidth(1);

        return [];
    }
}
