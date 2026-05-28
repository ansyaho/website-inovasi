<?php

namespace App\Exports;

use App\Models\SiswaBaru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class UsersExport implements 
    FromCollection,
    WithHeadings,
    WithCustomStartCell,
    WithEvents,
    ShouldAutoSize,
    WithMapping   
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return SiswaBaru::where('psb_id', $this->id)
            ->select('nama', 'asalSekolah', 'noTlp', 'alamat', 'updated_at', 'status')
            ->get();
    }

    // Data mulai dari baris ke-3
    public function startCell(): string
    {
        return 'A3';
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Asal Sekolah',
            'No Telepon',
            'Alamat',
            'Tanggal Pendaftaran',
            'Status',
        ];
    }

    // ✅ FORMAT DATA DI SINI
    public function map($row): array
    {
        return [
            $row->nama,
            $row->asalSekolah,
            $row->noTlp,
            $row->alamat,
            $row->updated_at 
                ? $row->updated_at->translatedFormat('d F Y') 
                : '-', // kalau null
            $row->status,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {

                // === JUDUL ===
                $event->sheet->mergeCells('A1:F1');
                $event->sheet->setCellValue('A1', 'DATA PENDAFTARAN PPDB MA AL-IHSAN');

                $event->sheet->getStyle('A1')->getFont()
                    ->setBold(true)
                    ->setSize(16);

                $event->sheet->getStyle('A1')->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // === HEADER TABEL ===
                $event->sheet->getStyle('A3:F3')
                    ->getFont()
                    ->setBold(true);

                $event->sheet->getStyle('A3:F3')
                    ->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('D9D9D9');
            },
        ];
    }
}
