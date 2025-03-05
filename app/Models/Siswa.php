<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Siswa extends Model
{
    public $fillable = [
        'name'
    ];

    public $table = 'siswas';

    public function nisn(): HasOne {
        return $this->hasOne(Nisn::class, 'siswa_id');
    }
    

    public function phone() : HasMany {
        return $this->hasMany(Phone::class);
    }

    public function hobbies(): BelongsToMany {
        return $this->belongsToMany(Hobby::class, 'hobby_siswa');
    }
}
