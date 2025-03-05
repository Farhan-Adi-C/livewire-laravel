<?php

namespace App\Livewire\Phone;

use App\Models\Phone;
use App\Models\Siswa;
use Livewire\Component;

class Create extends Component
{

    public $phone, $siswa, $siswaId;

    public function mount($id){
        $siswa = Siswa::findOrFail($id);
        $this->siswa = $siswa->name;
        $this->siswaId = $id;
    }

    public function render()
    {
        return view('livewire.phone.create');
    }

    public function store(){
        // $siswa = Siswa::findOrFail($this->siswaId);

        // $siswa->phone->phone = $this->phone;

        Phone::create([
            'phone' => $this->phone,
            'siswa_id' => $this->siswaId
        ]);

        return redirect()->route('phone.edit', ['id' => $this->siswaId]);
        
    }   


}
