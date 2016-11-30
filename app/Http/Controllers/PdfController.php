<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Kendaraan;
use PDF;

class PdfController extends Controller
{
    public function get_kendaraan_pdf(){
        //->stream=preview download=download
        $kendaraan = Kendaraan::all();
        $pdf=PDF::loadView('pdf.kendaraan',['datakendaraan'=> $kendaraan]);
        return $pdf->stream('kendaraan.pdf');
    }
}
