<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayat extends Model
{
    use HasFactory;

    protected $table = 'ayat';

    protected $guarded = [];

    public function surat(){

        return $this->belongsTo(Surat::class, 'surat_id');
    }
}
