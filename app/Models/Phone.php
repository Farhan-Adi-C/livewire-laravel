<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    public $fillable = [
        'phone',
        'siswa_id'
    ];

    public $table = 'phones';

    public function siswa(): BelongsTo {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
