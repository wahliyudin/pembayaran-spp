<?php

namespace App\Http\Livewire\Admin;

use App\Models\Free;
use App\Models\DataClass;
use App\Models\Major;
use App\Models\Monthly;
use App\Models\Student;
use App\Models\TypeOfPayment;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class TarifPembayaranComponent extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $type_of_payment;

    public $filter = [
        'data_class_id' => null,
        'major_id' => null
    ];

    public $type_of_payment_id;
    public $students;


    public function mount($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            $this->alert('error', $e->getMessage());
        }
        $this->type_of_payment = TypeOfPayment::findOrFail($decrypted);
        $this->type_of_payment_id = $this->type_of_payment->id;
    }

    public function render()
    {
        return view('livewire.admin.tarif-pembayaran-component', [
            'data_classes' => DataClass::get(),
            'majors' => Major::get(),
            'monthlies' => DB::table('monthlies')->join('students', 'students.id', '=', 'monthlies.student_id')->join('data_classes', 'data_classes.id', '=', 'students.data_class_id')->join('majors', 'majors.id', '=', 'students.major_id')->when(Arr::get($this->filter, 'data_class_id'), function (Builder $query) {
                $query->where('data_classes.id', Arr::get($this->filter, 'data_class_id'))->first();
            })->when(Arr::get($this->filter, 'major_id'), function (Builder $query) {
                $query->where('majors.id', Arr::get($this->filter, 'major_id'))->first();
            })->select('students.nim as student_nim', 'students.name as student_name', 'data_classes.name as data_class_name', 'majors.name as major_name', 'monthlies.*')->paginate(5)
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
}
