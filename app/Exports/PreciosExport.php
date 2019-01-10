<?php

namespace SilverDC\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PreciosExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
    	$auxDetalleBoletas = session('auxValue');
        return view('reports.table', compact('auxDetalleBoletas'));
    }
}
