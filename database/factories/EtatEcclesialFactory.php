<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EtatEcclesialFactory extends Factory
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
            'institut'=> $this->faker->randomElement(array('Frere Azuza', 'Mariono')),
            'sigle'=> $this->faker->randomElement(array('Fz', 'MR')),
            'etat'=> $this->faker->randomElement(array('Religieux', 'Pretre')),
        ];
    }
}
