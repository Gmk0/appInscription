<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DossierEtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
   public function definition()
    {
        return [
            'matricule_etudiant' => matricule(),
            'Aptitude_physique' => matricule()."Aptitute.pdf",
            'Certificat_naiss' =>matricule()."Certificat.docx",
            'Diplome_etat' =>matricule()."Diplome.docx",
            'Bulletin' => matricule()."bulletin.docx"
        ];
    }
}
