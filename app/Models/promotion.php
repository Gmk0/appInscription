<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    use HasFactory;

     protected $fillable = [
        'designation_promotion',
        'id_faculte',
    ];
     public function faculte()
    {
        return $this->hasOne(faculte::class, 'id_faculte', 'id_faculte');
    }
    public function inscription()
    {
        return $this->hasOne(etudiantInscrit::class, 'id_promotion', 'id_promotion');
    }
}
