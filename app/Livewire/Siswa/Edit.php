<?php

namespace App\Livewire\Siswa;

use App\Models\Hobby;
use App\Models\Siswa;
use Livewire\Component;

class Edit extends Component
{
    public $siswa, $nisn, $hobbies = [], $siswaId;

    public function mount($id)
    {
        $findSiswa = Siswa::findOrFail($id);
        $this->siswaId = $findSiswa->id;
        $this->siswa = $findSiswa->name;
        $this->nisn = $findSiswa->nisn->nisn;
        $this->hobbies = $findSiswa->hobbies->pluck('id')->toArray();
    }
    
    public function update()
    {
        $findSiswa = Siswa::findOrFail($this->siswaId);
        $findSiswa->name = $this->siswa;
        $findSiswa->hobbies()->sync($this->hobbies);
        $findSiswa->save();

        return redirect()->route('siswa.index');
    }
    
    public function render()
    {
        return view('livewire.siswa.edit', [
            'hobbiesList' => Hobby::all()
        ]);
    }
}
