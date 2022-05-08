<?php

namespace App\Http\Livewire\Admin;

use App\Models\SchoolYear;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class TahunPelajaranComponent extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $modal = false;

    public $school_year_model;

    public $school_year;
    public $status;

    protected $listeners = ['destroy'];

    public function render()
    {
        return view('livewire.admin.tahun-pelajaran-component', [
            'school_years' => SchoolYear::paginate(5)
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'school_year' => 'required',
            'status' => 'required|boolean'
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

    public function edit(SchoolYear $school_year_model)
    {
        $this->school_year_model = $school_year_model;
        $this->school_year = $school_year_model->school_year;
        $this->status = $school_year_model->status;
        $this->showModal();
    }

    public function update()
    {
        try {
            $this->school_year_model->update([
                'school_year' => $this->school_year,
                'status' => $this->status
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
            'school_year' => 'required',
            'status' => 'required|boolean'
        ]);
        try {
            SchoolYear::create($validatedData);
            $this->closeModal();
            $this->alert('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }


    public function delete(SchoolYear $school_year_model)
    {
        $this->school_year_model = $school_year_model;
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
            $this->school_year_model->delete();
            $this->reset();
            $this->alert('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }
}
