<?php

namespace App\Http\Livewire\Admin;

use App\Models\DataClass;
use App\Models\Major;
use App\Models\Student;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class PesertaDidikComponent extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $modal = false;

    public $student;

    public $name;
    public $nim;
    public $data_class_id;
    public $major_id;
    public $status;

    protected $listeners = ['destroy'];

    public function render()
    {
        return view('livewire.admin.peserta-didik-component', [
            'students' => Student::with(['dataClass', 'major'])->paginate(5),
            'data_classes' => DataClass::get(),
            'majors' => Major::get()
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required',
            'nim' => 'required',
            'data_class_id' => 'required',
            'major_id' => 'required',
            'status'  => 'required'
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

    public function edit(Student $student)
    {
        $this->student = $student;
        $this->name = $student->name;
        $this->nim = $student->nim;
        $this->data_class_id = $student->data_class_id;
        $this->major_id = $student->major_id;
        $this->status = $student->status;
        $this->showModal();
    }

    public function update()
    {
        try {
            $this->student->update([
                'name' => $this->name,
                'nim' => $this->nim,
                'data_class_id' => $this->data_class_id,
                'major_id' => $this->major_id,
                'status'  => $this->status
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
            'nim' => 'required',
            'data_class_id' => 'required',
            'major_id' => 'required',
            'status'  => 'required'
        ]);
        try {
            Student::create($validatedData);
            $this->closeModal();
            $this->alert('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }


    public function delete(Student $student)
    {
        $this->student = $student;
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
            $this->student->delete();
            $this->reset();
            $this->alert('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }
}
