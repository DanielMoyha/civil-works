<?php

namespace App\Exports;

use App\Models\Work;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// class WorksDataExport implements FromCollection
class WorksDataExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $works;

    public function __construct() {
        $this->works = Work::all();
    }

    public function view() : View
    {
        // dd($this->works);
        return view('admin.works.works-export', [
            'works' => $this->works
        ]);
    }
}
