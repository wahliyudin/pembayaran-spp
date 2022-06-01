<?php

namespace App\Http\Livewire\Admin;

use App\Models\DataClass;
use App\Models\Free;
use App\Models\FreePayment;
use App\Models\Major;
use App\Models\Student;
use App\Models\TypeOfPayment;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
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
    public $free_bill;

    public $type;

    public $modal;

    public $free;

    protected $listeners = ['destroy'];

    public function mount($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        $this->type_of_payment = TypeOfPayment::findOrFail($decrypted);
        $this->type_of_payment_id = $this->type_of_payment->id;
        $this->type = $this->type_of_payment->type;
    }

    public function render()
    {

        return view('livewire.admin.tarif-tagihan-component', [
            'data_classes' => DataClass::get(),
            'majors' => Major::get(),
            // 'frees' => Free::with(['student' => function ($query) {
            //     $query->when(Arr::get($this->filter, 'data_class_id'), function ($query) {
            //         $query->where('data_class_id', Arr::get($this->filter, 'data_class_id'));
            //     })->when(Arr::get($this->filter, 'major_id'), function ($query) {
            //         $query->where('major_id', Arr::get($this->filter, 'major_id'));
            //     });
            // }, 'student.dataClass:id,name', 'student.major:id,name'])->paginate(5)
            'frees' => DB::table('frees')->join('students', 'students.id', '=', 'frees.student_id')->join('data_classes', 'data_classes.id', '=', 'students.data_class_id')->join('majors', 'majors.id', '=', 'students.major_id')->when(Arr::get($this->filter, 'data_class_id'), function (Builder $query) {
                $query->where('data_classes.id', Arr::get($this->filter, 'data_class_id'))->first();
            })->when(Arr::get($this->filter, 'major_id'), function (Builder $query) {
                $query->where('majors.id', Arr::get($this->filter, 'major_id'))->first();
            })->select('students.nim as student_nim', 'students.name as student_name', 'data_classes.name as data_class_name', 'majors.name as major_name', 'frees.*')->paginate(5)
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'student_id' => 'required',
            'free_bill' => 'required'
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
        $this->resetExcept(['type_of_payment', 'type_of_payment_id', 'type']);
        $this->showModal();
    }

    public function store()
    {
        $validatedData = $this->validate([
            'student_id' => 'required',
            'free_bill' => 'required'
        ]);
        try {
            Free::create([
                'student_id' => Arr::get($validatedData, 'student_id'),
                'type_of_payment_id' => $this->type_of_payment_id,
                'free_bill' => Arr::get($validatedData, 'free_bill')
            ]);
            $this->closeModal();
            $this->alert('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }

    public function edit(Free $free)
    {
        $this->free = $free;
        $this->data_class_id = $free->student->data_class_id;
        $this->students = Student::query()->where('data_class_id', $this->data_class_id)->get();
        $this->student_id = $free->student_id;
        $this->free_bill = $free->free_bill;
        $this->type_of_payment_id = $free->type_of_payment_id;
        $this->showModal();
    }

    public function update()
    {
        try {
            $this->free->update([
                'student_id' => $this->student_id,
                'free_bill' => $this->free_bill,
                'type_of_payment_id' => $this->type_of_payment_id
            ]);
            $this->closeModal();
            $this->alert('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }

    public function delete(Free $free)
    {
        $this->free = $free;
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
            $this->free->delete();
            $this->resetExcept(['type_of_payment', 'type_of_payment_id', 'free']);
            $this->alert('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }

    public function autoNumbering()
    {
        $thnBulan = Carbon::now()->year . Carbon::now()->month;
        if (FreePayment::count() === 0) {
            $this->nota = 'NT' . $thnBulan . '10000001';
        } else {
            $this->nota = 'NT' . $thnBulan . (int) substr(FreePayment::get()->last()->nota, -8) + 1;
        }
    }
}
