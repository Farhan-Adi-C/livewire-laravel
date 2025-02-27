<?php

namespace App\Livewire\Hobby;

use App\Models\Hobby;
use Livewire\Component;

class Edit extends Component
{
    public $hobbyId, $hobby;

    public function mount($id)
    {
        $hobby = Hobby::findOrFail($id);
        $this->hobbyId = $hobby->id;
        $this->hobby = $hobby->hobby;
    }

    public function update()
    {
        Hobby::findOrFail($this->hobbyId)->update([
            'hobby' => $this->hobby,
        ]);

        return redirect()->route('hobby.index');
    }

    public function render()
    {
        return view('livewire.hobby.edit');
    }

}
