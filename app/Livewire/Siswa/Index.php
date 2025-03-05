<?php

namespace App\Livewire\Siswa;

use App\Models\Nisn;
use App\Models\Siswa;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class Index extends Component
{

   

    public function render()
    {
        return view('livewire.siswa.index', [
            'siswas' => Siswa::all(),
            
        ]);
    }
  
    public function delete($id){
        Siswa::where('id', $id)->delete();
        return redirect()->route('siswa.index');
    }
}
