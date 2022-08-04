<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class etudiantInscrit extends Model
{
     use HasFactory;
     protected $fillable=[
         'matricule_etudiant',
         'id_promotion',
         'id_annee',
         'statut_etudiant'


     ];
     protected $primaryKey = 'id_inscrit';
     
    public function promotion()
    {
        return $this->belongsTo(promotion::class, 'id_promotion', 'id_promotion');
    }
    public function etudiant()
    {
        return $this->belongsTo(etudiant::class, 'matricule_etudiant', 'matricule_etudiant');
    }
     public function anneeAcademique()
    {
        return $this->hasOne(anneeAcademique::class, 'id_annee', 'id_annee');
    }
    public function paiement()
    {
        return $this->hasOne(paiementFrais::class, 'matricule_etudiant', 'matricule_etudiant');
    }

}
