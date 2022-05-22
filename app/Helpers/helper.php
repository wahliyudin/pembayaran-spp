<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('resetFileTemp')) {
    function resetFileTemp()
    {
        if (count(Storage::files('livewire-tmp')) >= 1) {
            Storage::deleteDirectory('livewire-tmp');
            Storage::makeDirectory('livewire-tmp');
        }
    }
}


if (!function_exists('numberFormat')) {
    function numberFormat(int $number)
    {
        return number_format($number, 0, ',', '.');
    }
}
