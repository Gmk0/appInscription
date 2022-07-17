<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;



class dossierEtudiant extends Model
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
        'Diplome_access' => 'array',
        'Cursus_univeristaire' => 'array',
    ];
}
