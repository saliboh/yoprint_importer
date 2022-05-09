<?php

namespace App\Http\Livewire;

use App\Models\File;
use Livewire\Component;

class DisplayImport extends Component
{
    public $data;
    public $name;
    public $status;
    public $created_at;

    public function render()
    {
        $this->data = File::all();
        return view('livewire.display-import');
    }
}
