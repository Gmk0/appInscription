<?php


namespace App\Helpers;


class helper
{
    public static function IDgenaratorStudent($model, $trow, $length = 4, $prefix)
    {
        $data = $model::orderBy('id', 'desc')->first();
        $year = date('y');
        if (!$data) {
            $og_length = 0;
            $last_number = '3475';
        } else {
            $code = substr($data->$trow, 0, - (strlen($prefix) + 3));
            $actial_last_number = ($code / 1) * 1;
            $increment_last_number = ((int)$actial_last_number) + 1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for ($i = 0; $i < $og_length; $i++) {
            $zeros .= "0";
        }
        return $last_number . '/' . $prefix . $year;
    }
    public static function valideData()
    {
        return [
            'nom' => 'required|string',
            'Postnom' => 'required|string',
            'prenom' => 'required|string',
            'genre' => 'required|string',
            'etat_civil' => 'required|string',
            'nationalite' => 'required',
            'lieu_naiss' => 'required',
            'date_naiss' => 'required',
            'email' => 'required|email|unique:etudiants',
            'telephone' => 'required',
            'adresse' => 'required|',
            'adresse.commune' => 'required|string',
            'nom_pere' => 'required',
            'nom_mere' => 'required',
            'localisation_parent.province' => 'required',
            'localisation_parent.district' => 'required',
            'localisation_parent.commune' => 'required',
            'nom_tuteur' => 'required',
            'tel_tuteur' => 'required',
            'addresse_tuteur.Numero' => 'required',
            'addresse_tuteur.Avenue' => 'required',
            'addresse_tuteur.Quartier' => 'required',
            'addresse_tuteur.Commune' => 'required',
            'diplomeEtat.Diplome' => 'required|min:10',
            'diplomeEtat.Numero' => 'required',
            'diplomeEtat.Mention' => 'required',
            'diplomeEtat.Section' => 'required',
            'diplomeEtat.DelivreA' => 'required',
            'diplomeEtat.DateDu' => 'required',
            'promotion' => 'required|',
            'faculte' => 'required|',
            'annee_academique' => 'required|',
            'aptitude_physique' => 'required|mimes:doc,docx,pdf|max:1024',
            'diplome_etat_doc' => 'required|mimes:doc,docx,pdf|max:1024',
            'bulletin' => 'required|mimes:doc,docx,pdf|max:1024',
            'certificat_naiss' => 'required|mimes:doc,docx,pdf|max:1024',
            'photo' => 'required|mimes:jpeg,png,svg,jpg,gif|max:5000',
            'terms' => 'accepted'

        ];
    }
}
