<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantInscritFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'matricule_etudiant' => matricule(),

            'id_promotion' => PROMOTION,

            'id_annee' => '1',

        ];
    }
}
