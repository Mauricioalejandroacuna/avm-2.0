<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class AppreciationExport implements WithTitle, FromView, WithColumnWidths, WithEvents
{

    public function __construct($appreciation){
        $this->appreciation = $appreciation;
    }

    public function view(): View
    {
        return view('mail.excelReport', [
            'details' => $this->appreciation,
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 1.8,
            'B' => 11,
            'C' => 9.3,
            'D' => 9.3,
            'E' => 11,
            'F' => 11.9,
            'H' => 9.3,
            'I' => 14.8,
            'J' => 1.8,
        ];
    }

    public function title(): string
    {
        return 'Informe de Estimacion de Valor';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->setBreak('A27', \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_ROW);
                $event->sheet->setBreak('A63', \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_ROW);
                $event->sheet->setBreak('A83', \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_ROW);
                $spotLogos = ['B1', 'B28', 'B44', 'B64', 'B84'];
                $logoPath = public_path('logoValuaciones.png');
                foreach ($spotLogos as $spotLogo){
                    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooterDrawing();
                    $drawing->setName('Valuaciones logo');
                    $drawing->setPath($logoPath);
                    $drawing->setHeight(48);
                    $drawing->setCoordinates($spotLogo);
                    $drawing->setWorksheet($event->sheet->getDelegate());
                    $event->sheet->getDelegate()->getPageMargins()->setTop(0);
                }
                $event->sheet->getHeaderFooter()->setOddFooter('&C' . 'Almirante Pastene 244, Oficina 303' . '&R &P ');
            }
        ];
    }
}
