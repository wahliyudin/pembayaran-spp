<?php

namespace App\Http\Livewire\Admin;

use App\Models\Student;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard-component', [
            'student_active' => Student::query()->where('status', Student::STATUS_ACTIVE)->count()
        ]);
    }
}
