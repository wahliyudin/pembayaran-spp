<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function exportBuktiTransaksiBulanan($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            $informasi = SchoolProfile::first();
            $student = Student::with(['dataClass', 'major', 'monthly'])->findOrFail($decrypted);
            $monthlies = DB::table('monthlies')->join(
                'type_of_payments',
                'type_of_payments.id',
                '=',
                'monthlies.type_of_payment_id'
            )->join(
                'monthly_payments',
                'monthly_payments.monthly_id',
                '=',
                'monthlies.id'
            )->join(
                'months',
                'months.id',
                '=',
                'monthly_payments.month_id'
            )->where('monthlies.student_id', $decrypted)->select(
                'type_of_payments.type_payment as type_of_payment_name',
                'months.name as month_name',
                'monthly_payments.id',
                'monthly_payments.month_bill',
                'monthly_payments.payment_number',
                'monthly_payments.status',
                'monthly_payments.payment_date'
            )->get();
            $pdf = PDF::loadView('exports.bukti-transaksi-pembayaran-bulanan', compact('monthlies', 'student',
            'informasi'));
            return $pdf->setPaper('A4')->stream();
        } catch (DecryptException $th) {
            throw $th;
        }
    }

    public function exportBuktiTransaksiBebas($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            $informasi = SchoolProfile::first();
            $student = Student::with(['dataClass', 'major'])->findOrFail($decrypted);
            $frees = DB::table('frees')->join(
                'type_of_payments',
                'type_of_payments.id',
                '=',
                'frees.type_of_payment_id'
            )->join(
                'free_payments',
                'free_payments.free_id',
                '=',
                'frees.id'
            )->join(
                'users',
                'users.id',
                '=',
                'free_payments.user_id'
            )->where('frees.student_id', $decrypted)->select(
                'frees.free_bill',
                'frees.total_payment',
                'type_of_payments.type_payment',
                'free_payments.payment_number',
                'free_payments.billing',
                'free_payments.description',
                'free_payments.created_at'
            )->get();
        } catch (DecryptException $th) {
        }
        $pdf = PDF::loadView('exports.bukti-transaksi-pembayaran-bebas', compact('frees', 'student', 'informasi'));

        return $pdf->setPaper('a4')->stream();
    }

    public function cetakFormatExcel()
    {
        return response()->download(public_path('storage/format/format.xlsx'));
    }
}
