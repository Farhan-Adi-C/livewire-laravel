<?php

namespace App\Livewire\Phone;

use App\Models\Phone;
use App\Models\Siswa;
use Livewire\Component;

class Edit extends Component
{

    public $siswa;

    public function mount($id)
    {
        $this->siswa = Siswa::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.phone.edit', [
            'siswa' => $this->siswa
        ]);
    }

    public function delete($id){
        Phone::where('id', $id)->delete();
        return redirect()->back();
    }
}
