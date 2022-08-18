<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\etudeRealiser;
use App\Models\tuteurEtudiant;
use App\Models\dossierEtudiant;
use App\Models\etudiantInscrit;
use App\Models\etatEcclesial;

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
    public function ecclesiaste()
    {
        return $this->hasOne(etatEcclesial::class, 'matricule_etudiant', 'matricule_etudiant');
    }

    public function inscription()
    {
        return $this->hasOne(etudiantInscrit::class, 'matricule_etudiant', 'matricule_etudiant');
    }
    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('Nom', 'like', $term)
                ->orWhere('matricule_etudiant', 'like', $term);
        });
    }
    /**
     *@var array
     */

    protected $casts = [
        "Localisation_parent" => "array",
        "Adresse_etudiant" => "array"
    ];
}
