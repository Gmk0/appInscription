<?php

namespace Database\Factories;

use App\Helpers\helper;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\etudiant;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return string
     */
    public function matricule()
    {
        return Helper::IDgenaratorStudent(New etudiant, 'matricule_etudiant', 4, FACULTE);
    }

    public function definition()
    {

        return [
            "Nom" => $this->faker->lastName,
            "matricule_etudiant" => $this->matricule(),
            "Postnom" => $this->faker->lastName,
            "Prenom" => $this->faker->firstName,
            "Genre" => $this->faker->randomElement(array('M', 'F')),
            "Etat_civil" => $this->faker->randomElement(array('Celibataire', 'Marier')),
            "Nationalite" => $this->faker->randomElement(array('Congolaise', 'Camerounais')),
            "Lieu_naiss" => $this->faker->city,
            "Date_naiss" => $this->faker->dateTimeBetween('1990-01-01', '2005-12-31')->format('d/m/Y'),
            "Telephone" => $this->faker->phoneNumber,
            "Institut_religieux" => $this->faker->randomElement(array('LAIC', 'RELIGIEUX')),

            "Email" => $this->faker->freeEmail,
            'Adresse_etudiant' => [
                'Numero' => $this->faker->numberBetween(1, 100),
                'avenue' => $this->faker->streetName(),
                'Quartier' => $this->faker->randomElement(array('Lodja', 'Pende', 'Mont', 'Matonge')),
                'commune' => $this->faker->randomElement(array('KINSHASA', 'LIMETE', 'GOMBE', 'KALAMU')),
            ],
            "Nom_Pere" => $this->faker->name('male'),
            "Nom_mere" => $this->faker->name('female'),
            "Localisation_parent" => [
                "province" => $this->faker->city,
                "district" => $this->faker->city,
                "commune" => $this->faker->city
            ],
            "Photo" => "noImage.jpg",

        ];
    }
}
