<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use App\Models\SchoolYear;
use App\Models\TypeOfPayment;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class JenisPembayaranComponent extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $modal = false;

    public $typeOfPayment;

    public $payment_id;
    public $type_payment;
    public $type;
    public $school_year_id;

    protected $listeners = ['destroy'];

    public function render()
    {
        return view('livewire.admin.jenis-pembayaran-component', [
            'type_of_payments' => TypeOfPayment::paginate(5),
            'payments' => Payment::get(),
            'school_years' => SchoolYear::get()
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'payment_id' => 'required',
            'type_payment' => 'required',
            'type' => 'required',
            'school_year_id' => 'required'
        ]);
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
        $this->reset();
        $this->showModal();
    }

    public function edit(TypeOfPayment $typeOfPayment)
    {
        $this->typeOfPayment = $typeOfPayment;
        $this->payment_id = $typeOfPayment->payment_id;
        $this->type_payment = $typeOfPayment->type_payment;
        $this->type = $typeOfPayment->type;
        $this->school_year_id = $typeOfPayment->school_year_id;
        $this->showModal();
    }

    public function update()
    {
        try {
            $this->typeOfPayment->update([
                'payment_id' => $this->payment_id,
                'type_payment' => $this->type_payment,
                'type' => $this->type,
                'school_year_id' => $this->school_year_id
            ]);
            $this->closeModal();
            $this->alert('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }

    public function store()
    {
        $validatedData = $this->validate([
            'payment_id' => 'required',
            'type_payment' => 'required',
            'type' => 'required',
            'school_year_id' => 'required'
        ]);
        try {
            TypeOfPayment::create($validatedData);
            $this->closeModal();
            $this->alert('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }


    public function delete(TypeOfPayment $typeOfPayment)
    {
        $this->typeOfPayment = $typeOfPayment;
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
            $this->typeOfPayment->delete();
            $this->reset();
            $this->alert('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }

    public function updatedPaymentId()
    {
        if (!empty($this->payment_id) && !empty($this->school_year_id)) {
            $this->type_payment = $this->getPaymentName($this->payment_id) . ' - TP ' . $this->getSchoolYear($this->school_year_id);
        }
    }

    public function updatedSchoolYearId()
    {
        if (!empty($this->payment_id) && !empty($this->school_year_id)) {
            $this->type_payment = $this->getPaymentName($this->payment_id) . ' - TP ' . $this->getSchoolYear($this->school_year_id);
        }
    }

    public function getPaymentName($payment_id)
    {
        return Payment::find($payment_id)->first()->name;
    }

    public function getSchoolYear($school_year_id)
    {
        $school_year = SchoolYear::find($school_year_id)->first();
        return $school_year->year_start . ' / ' . $school_year->year_end;
    }
}
