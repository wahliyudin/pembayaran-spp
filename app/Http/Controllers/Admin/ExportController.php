<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use PDF;

class ExportController extends Controller
{
    public function exportBuktiTransaksiBulanan($id)
    {
        $student = Student::findOrFail($id)->with('dataClass:name', 'major:name', 'frees', 'monthly')->first();
        $pdf = PDF::loadView('exports.bukti-transaksi-pembayaran-bulanan', compact('student'));

        return $pdf->setPaper('a4')->stream();
    }

    public function exportBuktiTransaksiBebas($id)
    {
        $student = Student::findOrFail($id)->with('dataClass:name', 'major:name', 'frees', 'monthly')->first();
        $pdf = PDF::loadView('exports.bukti-transaksi-pembayaran-bebas', compact('student'));

        return $pdf->setPaper('a4')->stream();
    }
}
