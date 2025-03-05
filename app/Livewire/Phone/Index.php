<?php

namespace App\Livewire\Phone;

use App\Models\Siswa;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.phone.index', [
            'siswas' => Siswa::all()
        ]);
    }
}
