<?php

namespace App\Http\Livewire\Admin;

use App\Models\DataClass;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class KelasComponent extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $modal = false;

    public $data_class;

    public $name;

    protected $listeners = ['destroy'];

    public function render()
    {
        return view('livewire.admin.kelas-component', [
            'data_classes' => DataClass::paginate(5)
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

    public function edit(DataClass $data_class)
    {
        $this->data_class = $data_class;
        $this->name = $data_class->name;
        $this->showModal();
    }

    public function update()
    {
        try {
            $this->data_class->update([
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
            DataClass::create($validatedData);
            $this->closeModal();
            $this->alert('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }


    public function delete(DataClass $data_class)
    {
        $this->data_class = $data_class;
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
            $this->data_class->delete();
            $this->reset();
            $this->alert('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }
}
