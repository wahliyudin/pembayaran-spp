<?php

namespace App\Http\Livewire\Admin;

use App\Models\Free;
use App\Models\FreePayment;
use App\Models\MonthlyPayment;
use App\Models\SchoolYear;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class TransaksiSiwaComponent extends Component
{
    use LivewireAlert;

    public $student;
    public $school_year;
    public $monthly;
    public $free;

    public $monthlyPayment;

    public $description;
    public $monthly_payment_id;
    public $rest_of_the_bill;

    public $billing;
    public $free_description;
    public $free_bill;

    public $free_payments;

    public $type_of_payment;

    public $modal_monthly = false;
    public $modal_free = false;
    public $modal_free_payments = false;

    public $filter = [
        'school_year_id' => '',
        'student_nim' => ''
    ];

    public function render()
    {
        return view('livewire.admin.transaksi-siwa-component', [
            'school_years' => SchoolYear::get()
        ]);
    }

    public function showModalMonthly()
    {
        $this->modal_monthly = true;
    }

    public function closeModalMothly()
    {
        $this->modal_monthly = false;
    }

    public function showModalFree()
    {
        $this->modal_free = true;
    }

    public function closeModalFree()
    {
        $this->modal_free = false;
    }

    public function showModalPayment()
    {
        $this->modal_free_payments = true;
    }

    public function closeModalPayment()
    {
        $this->modal_free_payments = false;
    }

    public function updatedFilterStudentNim()
    {
        $nim = Arr::get($this->filter, 'student_nim');
        $school_year_id = Arr::get($this->filter, 'school_year_id');
        if (!empty($nim) && !empty($school_year_id)) {
            $this->student = Student::with(['dataClass', 'major', 'frees', 'frees.freePayments', 'monthly', 'monthly.monthlyPayments'])->where('nim', $nim)->first();
            if (isset($this->student)) {
                $this->rest_of_the_bill = $this->student->monthly?->monthlyPayments->where('status', MonthlyPayment::STATUS_FALSE)->sum('month_bill');
            }
        }
    }

    public function payMonthly(MonthlyPayment $monthlyPayment)
    {
        $this->monthlyPayment = $monthlyPayment;
        $this->description = $this->monthlyPayment->description;
        $this->showModalMonthly();
    }

    public function storeMonthly()
    {
        try {
            $this->monthlyPayment->update([
                'description' => $this->description,
                'status' => MonthlyPayment::STATUS_TRUE,
                'payment_date' => now()->format('Y-m-d'),
                'payment_number' => $this->autoNumbering('monthlypayment')
            ]);
            $this->alert('success', 'Pembayaran Berhasil');
            $nim = Arr::get($this->filter, 'student_nim');
            $school_year_id = Arr::get($this->filter, 'school_year_id');
            if (!empty($nim) && !empty($school_year_id)) {
                $this->student = Student::with(['dataClass', 'major', 'frees', 'frees.freePayments', 'monthly', 'monthly.monthlyPayments'])->where('nim', $nim)->first();
                $this->rest_of_the_bill = $this->student->monthly->monthlyPayments->where('status', MonthlyPayment::STATUS_FALSE)->sum('month_bill');
            }
            $this->closeModalMothly();
            $this->reset('description');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }

    public function payFree(Free $free)
    {
        $this->free = $free;
        $this->free_bill = $this->free->free_bill;
        $this->showModalFree();
    }

    public function storeFree()
    {
        if ((int) $this->billing > $this->free->free_bill) {
            $this->alert('warning', 'Total Bayar tidak boleh lebih dari Total Tagihan');
        } else {
            $this->validate([
                'free_description' => 'required',
                'billing' => 'required'
            ]);
            try {
                $this->free->freePayments()->create([
                    'user_id' => auth()->user()->getAuthIdentifier(),
                    'payment_number' => $this->autoNumbering('freepayment'),
                    'billing' => $this->billing,
                    'description' => $this->free_description
                ]);
                $this->free->update([
                    'total_payment' => $this->free->freePayments->sum('billing'),
                    'free_bill' => $this->free->free_bill - $this->billing
                ]);
                $nim = Arr::get($this->filter, 'student_nim');
                $school_year_id = Arr::get($this->filter, 'school_year_id');
                if (!empty($nim) && !empty($school_year_id)) {
                    $this->student = Student::with(['dataClass', 'major', 'frees', 'frees.freePayments', 'monthly', 'monthly.monthlyPayments'])->where('nim', $nim)->first();
                    $this->rest_of_the_bill = $this->student->monthly->monthlyPayments->where('status', MonthlyPayment::STATUS_FALSE)->sum('month_bill');
                }
                $this->closeModalFree();
                $this->reset('free_description', 'billing');
                $this->alert('success', 'Pembayaran Berhasil');
            } catch (\Throwable $th) {
                $this->alert('error', $th->getMessage());
            }
        }
    }

    public function autoNumbering($type)
    {
        $thnBulan = Carbon::now()->year . Carbon::now()->month;
        if ($type === 'monthlypayment') {
            if (MonthlyPayment::where('payment_number', '!=', null)->count() === 0) {
                return 'MP' . $thnBulan . '10000001';
            } else {
                return 'MP' . $thnBulan . (int) substr(MonthlyPayment::where('payment_number', '!=', null)->orderBy('updated_at', 'asc')->get()->last()->payment_number, -8) + 1;
            }
        } elseif ($type === 'freepayment') {
            if (FreePayment::count() === 0) {
                return 'FP' . $thnBulan . '10000001';
            } else {
                return 'FP' . $thnBulan . (int) substr(FreePayment::get()->last()->payment_number, -8) + 1;
            }
        }
    }

    public function freePayments(Free $free)
    {
        $this->free_payments = $free->freePayments;
        $this->arrears = $free->free_bill;
        $this->showModalPayment();
    }

    public function destroyFreePayment(FreePayment $freePayment)
    {
        try {
            $freePayment->delete();
            $freePayment->free->update([
                'total_payment' => $freePayment->free->total_payment - $freePayment->billing,
                'free_bill' => $freePayment->free->free_bill + $freePayment->billing
            ]);
            $this->student = $freePayment->free->student;
            $this->free_payments = $freePayment->free->freePayments;
            $this->arrears = $freePayment->free->free_bill;
            $this->alert('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }
}
