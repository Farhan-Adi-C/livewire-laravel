<?php

namespace App\Livewire\Hobby;

use App\Models\Hobby;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.hobby.index', [
            'hobbies' => Hobby::all()
        ]);
    }

    public function delete($id)
    {
        Hobby::findOrFail($id)->delete();
    }

    
}
