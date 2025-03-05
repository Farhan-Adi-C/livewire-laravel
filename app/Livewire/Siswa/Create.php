<?php

namespace App\Livewire\Siswa;

use App\Models\Hobby;
use App\Models\Nisn;
use App\Models\Phone;
use App\Models\Siswa;
use Livewire\Component;

class Create extends Component
{

    public $name;
    public $nisn;
    public $phones = [];
    public $hobbiess = [];
  

    public function render()
    {
        
        return view('livewire.siswa.create', [
            'hobbies' => Hobby::all()
        ]);
    }

    public function store(){
        

        $siswa = Siswa::create([
            'name' => $this->name
        ]);

        Nisn::Create([
            'nisn' => $this->nisn,
            'siswa_id' => $siswa->id
        ]);
        
        foreach ($this->phones as $phone) {
            Phone::create([
                'siswa_id' => $siswa->id,
                'phone' => $phone
            ]);
        }

        $siswa->hobbies()->sync($this->hobbiess);


        return redirect()->route('siswa.index');
    }

    
}
