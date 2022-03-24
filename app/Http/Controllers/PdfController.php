<?php

namespace App\Http\Controllers;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function print()
{
    
    $pdf = PDF::loadView('pdf.invoice', $data);
    return $pdf->download('invoice.pdf');
}
}
