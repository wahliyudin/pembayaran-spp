<?php

namespace App\Http\Livewire\Admin;

use App\Models\SchoolProfile;
use App\Services\SchoolProfileService;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ProfileSekolahComponent extends Component
{
    use LivewireAlert;
    public $level;
    public $name;
    public $address;
    public $districts;
    public $city;
    public $phone;
    public $logo;

    public function mount()
    {
        $schoolProfile = SchoolProfile::first();
        $this->level = $schoolProfile->level;
        $this->name = $schoolProfile->name;
        $this->address = $schoolProfile->address;
        $this->districts = $schoolProfile->districts;
        $this->city = $schoolProfile->city;
        $this->phone = $schoolProfile->phone;
        $this->logo = $schoolProfile->logo;
    }

    public function render()
    {
        return view('livewire.admin.profile-sekolah-component');
    }

    public function store()
    {
        try {
            SchoolProfile::first()->update([
                'level' => $this->level,
                'name' => $this->name,
                'address' => $this->address,
                'districts' => $this->districts,
                'city' => $this->city,
                'phone' => $this->phone
            ]);
            $this->alert('success', 'Data Berhasil Dirubah');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }
}
