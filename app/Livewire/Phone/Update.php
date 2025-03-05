<?php

namespace App\Livewire\Phone;

use App\Models\Phone;
use Livewire\Component;

class Update extends Component
{
    public $phoneId, $phone_number, $siswaId;

    public function mount($id) // Tangkap dari URL
    {
        $phone = Phone::findOrFail($id);
        $this->phoneId = $phone->id;
        $this->phone_number = $phone->phone; 
        $this->siswaId = $phone->siswa_id;

    }

    public function update()
    {
       
        Phone::findOrFail($this->phoneId)->update([
            'phone' => $this->phone_number,
        ]);

        return redirect()->route('phone.edit', ['id' => $this->siswaId]);
    }

    public function render()
    {
        return view('livewire.phone.update');
    }
}
