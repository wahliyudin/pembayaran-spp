<?php

namespace App\Http\Livewire\Admin;

use App\Models\SchoolProfile;
use App\Services\SchoolProfileService;
use Livewire\Component;

class ProfileSekolahComponent extends Component
{

    public function render()
    {
        return view('livewire.admin.profile-sekolah-component', [
            'schoolProfile' => SchoolProfile::first()
        ]);
    }
}
