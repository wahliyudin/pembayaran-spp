<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\StudentImport;
use App\Imports\StudentMultipleImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function siswaImport(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:xls,xlsx'
            ]);
            if ($request->file('file')) {
                Excel::import(new StudentMultipleImport, $request->file('file'));
            }
            return back()->with('success', 'Data berhasil diimport');
        } catch (\Throwable $th) {
            return back()->with('error', 'Format yang dimasukan belum sesuai');
        }
    }
}
