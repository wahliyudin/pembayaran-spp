<?php

namespace App\Http\Livewire\Admin;

use App\Models\DataClass;
use App\Models\Major;
use App\Models\Month;
use App\Models\Monthly;
use App\Models\MonthlyPayment;
use App\Models\Student;
use App\Models\TypeOfPayment;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class TarifPembayaranKelasComponent extends Component
{
    use LivewireAlert;
    public $monthly = [];

    public $data_class_id;
    public $bill_all;

    public $type_of_payment;
    public $tarif_payment_id;

    public function mount($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            $this->tarif_payment_id = $decrypted;
        } catch (DecryptException $e) {
            abort(404);
        }
        $this->type_of_payment = TypeOfPayment::findOrFail($decrypted);
        foreach (Month::get() as $month) {
            $this->monthly[$month->id] = '';
        }
    }

    public function render()
    {
        return view('livewire.admin.tarif-pembayaran-kelas-component', [
            'months' => Month::get(),
            'data_classes' => DataClass::get()
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'data_class_id' => 'required'
        ]);
    }

    public function create()
    {
        try {
            $students = Student::with('monthly')->where('data_class_id', $this->data_class_id)->get();
            foreach ($students as $student) {
                if (!$student->monthly) {
                    $monthly = Monthly::create([
                        'student_id' => $student->id,
                        'type_of_payment_id' => $this->type_of_payment->id
                    ]);
                    foreach ($this->monthly as $key => $value) {
                        MonthlyPayment::create([
                            'user_id' => auth()->user()->id,
                            'month_id' => $key,
                            'monthly_id' => $monthly->id,
                            'month_bill' => $value
                        ]);
                    }
                }
            }
            $this->alert('success', 'Data Berhasil disimpan');
            return redirect()->route('tarif-pembayaran', Crypt::encrypt($this->tarif_payment_id));
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }

    public function createSame()
    {
        $this->validate([
            'data_class_id' => 'required',
            'bill_all' => 'required'
        ]);
        try {
            $students = Student::with('monthly')->where('data_class_id', $this->data_class_id)->get();
            foreach ($students as $student) {
                if (!$student->monthly) {
                    $monthly = Monthly::create([
                        'student_id' => $student->id,
                        'type_of_payment_id' => $this->type_of_payment->id
                    ]);
                    foreach (Month::get() as $month) {
                        MonthlyPayment::create([
                            'user_id' => auth()->user()->id,
                            'month_id' => $month->id,
                            'monthly_id' => $monthly->id,
                            'month_bill' => $this->bill_all
                        ]);
                    }
                }
            }
            $this->alert('success', 'Data Berhasil disimpan');
            return redirect()->route('tarif-pembayaran', Crypt::encrypt($this->tarif_payment_id));
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }
}
