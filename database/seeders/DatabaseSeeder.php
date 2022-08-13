<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\anneeAcademique;
use App\Models\DossierEtudiant;
use App\Models\etudeRealiser;
use App\Models\etudiant;
use App\Models\etudiantInscrit;
use App\Models\tuteurEtudiant;
use App\Models\etatEcclesial;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        for ($i = 0; $i < 25; $i++) {
            # code...
            etudiant::factory(1)->create();
            tuteurEtudiant::factory(1)->create();
            DossierEtudiant::factory(1)->create();
            etudeRealiser::factory(1)->create();
            etudiantInscrit::factory(1)->create();
            etatEcclesial::factory(1)->create();
        }
    }
}
