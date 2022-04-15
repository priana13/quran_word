<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KataAyat extends Model
{
    use HasFactory;

    protected $table = 'kata_ayat';

    protected $guarded = [];

    public function kata(){

    	return $this->belongsTo(Kata::class,'kata_id');
    }

    public function ayat(){

    	return $this->belongsTo(Ayat::class,'ayat_id');
    }
}
