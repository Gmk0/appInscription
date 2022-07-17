<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faculte extends Model
{
    use HasFactory;
     public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'id_faculte', 'id_faculte');
    }
}
