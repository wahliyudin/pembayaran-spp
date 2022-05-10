<?php

namespace App\Http\Livewire\Admin;

use App\Models\BillingRate;
use App\Models\DataClass;
use App\Models\Major;
use App\Models\Student;
use App\Models\TypeOfPayment;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class TarifTagihanComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $type_of_payment;

    public $filter = [
        'data_class_id' => null,
        'major_id' => null
    ];

    public $type_of_payment_id;
    public $data_class_id;
    public $students;
    public $student_id;
    public $billing;

    public $modal;

    public $billing_rate;

    protected $listeners = ['destroy'];

    public function mount($id)
    {
        $this->type_of_payment = TypeOfPayment::find($id)->first();
        $this->type_of_payment_id = $this->type_of_payment->id;
    }

    public function render()
    {
        return view('livewire.admin.tarif-tagihan-component', [
            'data_classes' => DataClass::get(),
            'majors' => Major::get(),
            'billing_rates' => DB::table('billing_rates')->join('students', 'students.id', '=', 'billing_rates.student_id')->join('data_classes', 'data_classes.id', '=', 'students.data_class_id')->join('majors', 'majors.id', '=', 'students.major_id')->when(Arr::get($this->filter, 'data_class_id'), function (Builder $query) {
                $query->where('data_classes.id', Arr::get($this->filter, 'data_class_id'))->first();
            })->when(Arr::get($this->filter, 'major_id'), function (Builder $query) {
                $query->where('majors.id', Arr::get($this->filter, 'major_id'))->first();
            })->select('students.nim as student_nim', 'students.name as student_name', 'data_classes.name as data_class_name', 'majors.name as major_name', 'billing_rates.*')->paginate(5)
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'student_id' => 'required',
            'billing' => 'required',
            'type_of_payment' => 'required'
        ]);
    }

    public function updatedDataClassId()
    {
        $this->students = Student::query()->where('data_class_id', $this->data_class_id)->get();
    }

    public function showModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function create()
    {
        $this->resetExcept(['type_of_payment', 'type_of_payment_id', 'billingRate']);
        $this->showModal();
    }

    public function store()
    {
        $validatedData = $this->validate([
            'student_id' => 'required',
            'billing' => 'required',
            'type_of_payment_id' => 'required'
        ]);
        try {
            BillingRate::create($validatedData);
            $this->closeModal();
            $this->alert('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }

    public function edit(BillingRate $billingRate)
    {
        $this->billingRate = $billingRate;
        $this->data_class_id = $billingRate->student->data_class_id;
        $this->students = Student::query()->where('data_class_id', $this->data_class_id)->get();
        $this->student_id = $billingRate->student_id;
        $this->billing = $billingRate->billing;
        $this->type_of_payment_id = $billingRate->type_of_payment_id;
        $this->showModal();
    }

    public function update()
    {
        try {
            $this->billingRate->update([
                'student_id' => $this->student_id,
                'billing' => $this->billing,
                'type_of_payment_id' => $this->type_of_payment_id
            ]);
            $this->closeModal();
            $this->alert('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }

    public function delete(BillingRate $billingRate)
    {
        $this->billingRate = $billingRate;
        $this->confirm('Apakah anda yakin?', [
            'text' => 'Data yang dihapus tidak akan di kembalikan lagi',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ya',
            'showCanceledButton' => true,
            'cancelButtonText' => 'Batal',
            'onConfirmed' => 'destroy',
            'onDismissed' => 'batal'
        ]);
    }

    public function destroy()
    {
        try {
            $this->billingRate->delete();
            $this->resetExcept(['type_of_payment', 'type_of_payment_id', 'billingRate']);
            $this->alert('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }
}
