<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tuteurEtudiant extends Model
{
    use HasFactory;
     public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'matricule_etudiant', 'matricule_etudiant');
    }
    /**
     *@var array
     */

    protected $casts = [
        "Adresse_tuteur" => "array"
    ];
    
    public function hasRole($role)
    {
        return User::where("role", $role)->first() !== null;
    }
    public function hasAnyRole($role)
    {
        return User::wherein("role", $role)->first() !== null;;
    }
}
