<?php

namespace App\Http\Livewire\Admin;

use App\Models\FreePayment;
use App\Models\MonthlyPayment;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $monthly_payment_now = MonthlyPayment::whereDate('payment_date', now()->format('Y-m-d'))->get('month_bill')->sum('month_bill');
        $free_payment_now = FreePayment::whereDate('created_at', now()->format('Y-m-d'))->get('billing')->sum('billing');
        $monthly_payment = MonthlyPayment::where('status', MonthlyPayment::STATUS_TRUE)->get('month_bill')->sum('month_bill');
        $free_payment = FreePayment::get('billing')->sum('billing');
        return view('livewire.admin.dashboard-component', [
            'student_active' => Student::query()->where('status', Student::STATUS_ACTIVE)->count(),
            'payment_now' => ($monthly_payment_now + $free_payment_now),
            'total_payment' => ($monthly_payment + $free_payment)
        ]);
    }
}
