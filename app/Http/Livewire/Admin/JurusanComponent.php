<?php

namespace App\Http\Livewire\Admin;

use App\Models\Major;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class JurusanComponent extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $modal = false;

    public $major;

    public $name;
    public $abbreviation;

    protected $listeners = ['destroy'];

    public function render()
    {
        return view('livewire.admin.jurusan-component', [
            'majors' => Major::paginate(5)
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required',
            'abbreviation' => 'required'
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

    public function edit(Major $major)
    {
        $this->major = $major;
        $this->name = $major->name;
        $this->abbreviation = $major->abbreviation;
        $this->showModal();
    }

    public function update()
    {
        try {
            $this->major->update([
                'name' => $this->name,
                'abbreviation' => $this->abbreviation
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
            'abbreviation' => 'required'
        ]);
        try {
            Major::create($validatedData);
            $this->closeModal();
            $this->alert('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }


    public function delete(Major $major)
    {
        $this->major = $major;
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
            $this->major->delete();
            $this->reset();
            $this->alert('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }
}
