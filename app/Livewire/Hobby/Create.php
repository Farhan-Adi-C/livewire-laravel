<?php

namespace App\Livewire\Hobby;

use App\Models\Hobby;
use Livewire\Component;

class Create extends Component
{
    public $hobby;

    public function store()
    {
        Hobby::create([
            'hobby' => $this->hobby,
        ]);

        return redirect()->route('hobby.index');
    }

    public function render()
    {
        return view('livewire.hobby.create');
    }

}
