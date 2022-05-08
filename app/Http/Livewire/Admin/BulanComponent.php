<?php

namespace App\Http\Livewire\Admin;

use App\Models\Month;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class BulanComponent extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $modal = false;

    public $month;

    public $name;

    public function render()
    {
        return view('livewire.admin.bulan-component', [
            'months' => Month::paginate(5)
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required'
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

    public function edit(Month $month)
    {
        $this->month = $month;
        $this->name = $month->name;
        $this->showModal();
    }

    public function update()
    {
        try {
            $this->month->update([
                'name' => $this->name
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
            'name' => 'required'
        ]);
        try {
            Month::create($validatedData);
            $this->closeModal();
            $this->alert('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }
}
