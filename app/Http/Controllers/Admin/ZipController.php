<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ZipController extends Controller
{
    public function downloadZip()
    {
        try {
            if (count(Storage::files('public/backup')) < 1) {
                Storage::makeDirectory('public/backup');
                Artisan::call('db:backup');
            } else {
                Storage::deleteDirectory('public/backup');
                Storage::makeDirectory('public/backup');
                Artisan::call('db:backup');
            }
            if (count(Storage::files('public/zip')) >= 1) {
                Storage::deleteDirectory('public/zip');
                Storage::makeDirectory('public/zip');
            }
            $zip = new ZipArchive;
            $fileName = 'storage/zip/dbbackup.zip';
            if ($zip->open(public_path(''.$fileName), ZipArchive::CREATE) === true) {
                $files = File::files(public_path('storage\backup'));
                foreach ($files as $key => $value) {
                    $relativeNameInZipFile = basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }
                $zip->close();
            }
            return response()->download(public_path($fileName));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
