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
            'etudiant.nom' => 'required|string',
            'etudiant.postnom' => 'required|string',
            'etudiant.prenom' => 'required|string',
            'etudiant.genre' => 'required|string',
            'etudiant.etat_civil' => 'required|string',
            'etudiant.nationalite' => 'required',
            'etudiant.lieu_naiss' => 'required',
            'etudiant.date_naiss' => 'required',
            'etudiant.email' => 'required|email|unique:etudiants',
            'etudiant.telephone' => 'required|numeric',
            'adresse' => 'required|',
            'adresse.commune' => 'required|string',
            'etudiant.nom_pere' => 'required',
            'etudiant.nom_mere' => 'required',
            'localisation_parent.province' => 'required',
            'localisation_parent.district' => 'required',
            'localisation_parent.commune' => 'required',
            'etudiant.nom_tuteur' => 'required',
            'etudiant.tel_tuteur' => 'required',
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
    public static function messages()
    {
        return [
            'etudiant.nom.required' => 'le champs nom est requis',
            'etudiant.postnom.required' => 'le champs postnom est requis',
            'etudiant.prenom.required' => 'le champs prenom est requis',
            'etudiant.genre.required' => 'le champs genre est requis',
            'etudiant.etat_civil.required' => 'le champs etat civil est requis',
            'etudiant.nationalite.required' => 'le champs nationalite est requis',
            'etudiant.lieu_naiss.required' => 'le champs lieu de naissance est requis',
            'etudiant.date_naiss.required' => 'le champs date de naissance est requis',
            'etudiant.email.required' => 'le champs email est requis',
            'etudiant.telephone.required' => 'le champs telephone est requis',
            'etudiant.nom_tuteur' => 'le champs nom tuteur est requis',
            'etudiant.tel_tuteur' => 'le champs telephone est requis',
            'etudiant.nom_pere' => 'le champs nom pere  est requis',
            'etudiant.nom_mere' => 'le champs nom mere est requis',
        ];
    }
}
