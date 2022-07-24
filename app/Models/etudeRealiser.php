<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;

class etudeRealiser extends Model
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
        "Cursus_univeristaire"=>"array",
        "Diplome_access" => "array",
        
    ];
   
}
