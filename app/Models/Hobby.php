<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Hobby extends Model
{
    protected $fillable = ["hobby"];

    protected $table = "hobbies";

    public function siswa(): BelongsToMany {
        return $this->belongsToMany(Siswa::class, 'hobby_siswa');
    }
}
