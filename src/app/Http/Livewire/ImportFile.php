<?php

namespace App\Http\Livewire;

use App\Imports\ProductsImport;
use App\Models\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportFile extends Component
{
    use WithFileUploads;
    public $files = [];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submit()
    {
        foreach ($this->files as $uploadedFile) {
            $file = new File();
            $file->name = $uploadedFile->getClientOriginalName();
            $file->save();
            $file->refresh();

            Excel::import(new ProductsImport($file), $uploadedFile);
        }

        session()->flash('message', 'File uploaded.');
    }

    public function render()
    {
        return view('livewire.import-file');
    }
}
