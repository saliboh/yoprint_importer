<?php

namespace App\Http\Livewire;

use App\Imports\ProductsImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportFile extends Component
{
    use WithFileUploads;
    public $file;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submit()
    {
        Excel::import(new ProductsImport, $this->file);

        session()->flash('message', 'File uploaded.');
    }

    public function render()
    {
        return view('livewire.import-file');
    }
}
