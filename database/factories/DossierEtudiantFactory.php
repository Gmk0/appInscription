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
            'Aptitude_physique' => "Aptitute.pdf",
            'Certificat_naiss' =>"Certificat.pdf",
            'Diplome_etat' =>"Diplome.pdf",
            'Bulletin' => "bulletin.pdf"
        ];
    }
}
