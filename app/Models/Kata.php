<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kata extends Model
{
    use HasFactory;

    protected $table = 'kata';

    public function kata_ayat(){

    	return $this->hasMany(KataAyat::class , 'kata_id');
    }
}
