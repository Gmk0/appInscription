<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{


    use HasFactory;
    public function etudesRealiser()
    {
        return $this->hasOne(etudeRealiser::class, 'matricule_etudiant', 'matricule_etudiant');
    }
    public function tuteurEtudiant()
    {
        return $this->hasOne(tuteurEtudiant::class, 'matricule_etudiant', 'matricule_etudiant');
    }
    public function dossierEtudiant()
    {
        return $this->hasOne(dossierEtudiant::class, 'matricule_etudiant', 'matricule_etudiant');
    }

    public function inscription()
    {
        return $this->hasOne(etudiantInscrit::class, 'matricule_etudiant', 'matricule_etudiant');
    }

    /**
     *@var array
     */

    protected $casts = [
        "Localisation_parent" => "array",
        "Adresse_etudiant" => "array"
    ];
}
