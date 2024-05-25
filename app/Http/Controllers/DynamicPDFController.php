<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

// Import the PDF class directly
use Barryvdh\DomPDF\PDF as DomPDF;

class DynamicPDFController extends Controller
{
    //

    public function generateReport()
    {
        $data = ['data' => $this->getData()]; // Assume getData() fetches your data
        $pdf = DomPDF::loadView('reksa_danas.report', $data); // Use the imported PDF class
        return $pdf->download('report.pdf');
    }
}