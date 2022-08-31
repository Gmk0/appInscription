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
        return Helper::IDgenaratorStudent(new etudiant, 'matricule_etudiant', 4, FACULTE);
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
            "Nationalite" => $this->faker->randomElement(array('Congolaise', 'Camerounais', 'ANGOLAIS', 'IVORIEN')),
            "Lieu_naiss" => $this->faker->city,
            "Date_naiss" => $this->faker->dateTimeBetween('1990-01-01', '2005-12-31')->format('d/m/Y'),
            "Telephone" => $this->faker->phoneNumber,


            "Email" => $this->faker->freeEmail,
            'Adresse_etudiant' => [
                'Numero' => $this->faker->numberBetween(1, 100),
                'Avenue' => $this->faker->streetName(),
                'Quartier' => $this->faker->randomElement(array('Lodja', 'Pende', 'isiro', 'Matonge')),
                'Commune' => $this->faker->randomElement(array('KINSHASA', 'LIMETE', 'GOMBE', 'KALAMU')),
            ],
            "Nom_Pere" => $this->faker->name('male'),
            "Nom_mere" => $this->faker->name('female'),
            "Localisation_parent" => [
                "Province" => $this->faker->city,
                "District" => $this->faker->city,
                "Commune" => $this->faker->city
            ],
            "tuteur" => [
                'nom_tuteur' => $this->faker->name('male'),
                "tel_tuteur" => $this->faker->phoneNumber(),
                'Numero' => $this->faker->numberBetween(1, 100),
                'Avenue' => $this->faker->streetName(),
                'Quartier' => $this->faker->randomElement(array('Lodja', 'Pende', 'Mont', 'Matonge')),
                'Commune' => $this->faker->randomElement(array('KINSHASA', 'LIMETE', 'GOMBE', 'KALAMU')),
            ],
            "diplome_access" => [
                'Diplome' => "Diplome d'etat",
                'Numero' => $this->faker->numberBetween(),
                'Option' => $this->faker->randomElement(array('Biologie', 'Math-physique', 'Pedagogie')),
                'Section' => $this->faker->randomElement(array('Scientifique', 'Litteraire', 'Pedagogie')),
                'Mention' => $this->faker->numberBetween(55, 83),
                'DelivreA' => "KINSHASA",
                'DateDu' => $this->faker->dateTimeBetween('01-01-2020', '31-01-2021')->format('d-m-y'),
                'Ecole' => $this->faker->city(),
                'Code' => $this->faker->numberBetween(),
                'Province' => $this->faker->randomElement(array('KINSHASA', 'KISANGANI', 'KONGO CENTRAL', 'KWILU'))
            ],
            "Photo" =>  $this->faker->randomElement(array('noImage.jpg', 'avatar2.png', 'avatar3.png', 'avatar5.png')),

        ];
    }
}
