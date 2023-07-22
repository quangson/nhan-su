<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class EmployeeFormatExport implements FromView, WithColumnFormatting
{
    use Exportable;

    /**
     * @return View
     */
    public function view(): View
    {
        return view('Admin.pages.employee.export_format');
    }

    public function columnFormats(): array
    {
        return [
            'L' => NumberFormat::FORMAT_TEXT,
            'M' => NumberFormat::FORMAT_TEXT,
            'Q' => NumberFormat::FORMAT_TEXT,
        ];
    }
}
