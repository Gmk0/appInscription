<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EtudeRealiserFactory extends Factory
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
            'Diplome_access' => [
                'Diplome' => "Diplome d'etat",
                'Numero' => $this->faker->numberBetween(),
                'Option' => $this->faker->randomElement(array('Biologie', 'Math-physique', 'Pedagogie')),
                'Section' => $this->faker->randomElement(array('Scientifique', 'Litteraire', 'Pedagogie')),
                'Mention' => $this->faker->numberBetween(55, 83),
                'DelivreA' => "KINSHASA",
                'DateDu' => $this->faker->dateTimeBetween('01-01-2020', '31-01-2021')->format('d-m-y'),
                'Ecole'=>$this->faker->city(),
                'Code'=>$this->faker->numberBetween(),
                'Province'=>$this->faker->randomElement(array('KINSHASA','KISANGANI','KONGO CENTRAL','KWILU'))

            ],


        ];
    }
}
