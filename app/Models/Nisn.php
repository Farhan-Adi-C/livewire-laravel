<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nisn extends Model
{
    public $fillable = [
        'nisn',
        'siswa_id'
    ];

    public $table = 'nisns';

    public function siswa(): BelongsTo {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

}
