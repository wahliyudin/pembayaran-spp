<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class NamaPembayaranComponent extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $modal = false;

    public $payment;

    public $name;
    public $description;


    public function render()
    {
        return view('livewire.admin.nama-pembayaran-component', [
            'payments' => Payment::paginate(5)
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required',
            'description' => 'required'
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

    public function edit(Payment $payment)
    {
        $this->payment = $payment;
        $this->name = $payment->name;
        $this->description = $payment->description;
        $this->showModal();
    }

    public function update()
    {
        try {
            $this->payment->update([
                'name' => $this->name,
                'description' => $this->description
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
            'name' => 'required',
            'description' => 'required'
        ]);
        try {
            Payment::create($validatedData);
            $this->closeModal();
            $this->alert('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }
}
