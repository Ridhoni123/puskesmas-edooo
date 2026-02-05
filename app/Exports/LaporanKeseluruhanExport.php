<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanKeseluruhanExport implements FromCollection, WithHeadings, WithMapping
{
    protected $data;
    protected $no = 1;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        // Mengubah array menjadi collection agar bisa diproses Excel
        return collect([
            ['nama' => 'Layanan Ibu Hamil (ANC)', 'jumlah' => $this->data['total_ibu_hamil']],
            ['nama' => 'Layanan Ibu Bersalin', 'jumlah' => $this->data['total_ibu_bersalin']],
            ['nama' => 'Kesehatan Bayi Baru Lahir', 'jumlah' => $this->data['total_bayi']],
            ['nama' => 'Layanan HIV / AIDS', 'jumlah' => $this->data['total_hiv']],
            ['nama' => 'Register Terduga TBC', 'jumlah' => $this->data['total_tbc']],
        ]);
    }

    public function headings(): array
    {
        return ["No", "Kategori Laporan", "Jumlah Pasien"];
    }

    public function map($row): array
    {
        return [
            $this->no++,
            $row['nama'],
            $row['jumlah'] . ' Orang'
        ];
    }
}
