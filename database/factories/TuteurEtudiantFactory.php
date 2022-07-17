<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TuteurEtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //  $table->id('id_tuteur');
            'matricule_etudiant' => matricule(),
            'Nom_tuteur' => $this->faker->name('male'),
            'Telephone_tuteur' => $this->faker->phoneNumber(),
            'Adresse_tuteur' => [
                'Numero' => $this->faker->numberBetween(1, 100),
                'Avenue' => $this->faker->streetName(),
                'Quartier' => $this->faker->randomElement(array('Lodja', 'Pende', 'Mont', 'Matonge')),
                'Commune' => $this->faker->randomElement(array('KINSHASA', 'LIMETE', 'GOMBE', 'KALAMU')),
            ]
        ];
    }
}
