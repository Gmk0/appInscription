<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paiementFrais extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule_etudiant',
        'id_payement',
        'client',
        'montant',
        'libelle'
    ];

    public function inscriptionCheck()
    {
        return $this->belongsTo(etudiantInscrit::class, 'matricule_etudiant', 'matricule_etudiant');
    }
}
