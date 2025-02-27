<?php

namespace App\Livewire\Hobby;

use App\Models\Hobby;
use Livewire\Component;

class Show extends Component
{
    public $hobby;

    public function mount($id)
    {
        $this->hobby = Hobby::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.hobby.show');
    }

}
