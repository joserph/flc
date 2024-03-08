<?php

namespace App\Http\Controllers;

use App\Models\ReturnReport;
use App\Models\ReturnReportItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function returnReportPdf($id)
    {
        $returnReport = ReturnReport::with('logistic')->with('client')->with('returnReportItems')->find($id);
        $returnReportItems = ReturnReportItem::with('diseases')->where('return_report_id', $returnReport->id)->get();
        // dd($returnReportItems);
        $returnReportPdf = Pdf::loadView('pdfs.returnReport', compact(
            'returnReport', 'returnReportItems'
        ));
        return $returnReportPdf->setPaper('a4', 'landscape')->stream();

        // dd($returnReport);
    }
}
