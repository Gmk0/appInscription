<?php

namespace App\Http\Livewire;

use App\Helpers\helper;
use App\Models\anneeAcademique;
use App\Models\dossierEtudiant;
use App\Models\etudeRealiser;
use App\Models\etudiant;
use App\Models\etudiantInscrit;
use App\Models\faculte;
use App\Models\promotion;
use App\Models\tuteurEtudiant;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Inscription extends Component
{
    use WithFileUploads;

    //etudiant_element

    public $nom;
    public $Postnom;
    public $prenom;
    public $genre;
    public $etat_civil;
    public $telephone;
    public $nationalite;
    public $lieu_naiss;
    public $date_naiss;
    public $adresse = [];
    public $institut_rel;
    public $sigle = "Laic";
    public $etat_eclesial;
    public $email;
    public $nom_pere;
    public $nom_mere;
    public $localisation_parent = [];
    public $photo;
    //tuteur
    public $nom_tuteur;
    public $tel_tuteur;
    public $addresse_tuteur = [];
    //etudes_faites
    public $diplomeEtat = [];
    public $cursus_universitaire = [];
    //document
    public $certificat_naiss;
    public $aptitude_physique;
    public $diplome_etat_doc;
    public $bulletin;
    //admis inscription
    public $promotion;
    public $faculte;
    public $annee_academique;
    public $terms;
    public $matricule;
    public $anneeAc;

    public $currentStep = 1;
    public $totalStep = 5;
    public $disabled = true;
    public $upload_aptPh;
    public $upload_certificat;
    public $upload_diplome;
    public $upload_bulletin;

    public function mount()
    {
        $this->currentStep = 1;
    }

    public function increaseStep()
    {

        $this->resetErrorBag();

        $this->currentStep++;
        if ($this->currentStep > $this->totalStep) {
            $this->currentStep = $this->totalStep;
        }
    }
    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }
    public function validateData()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'nom' => 'required|string',
                'postnom' => 'required|string',
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
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'nom_pere' => 'required',
                'nom_mere' => 'required',
                'localisation_parent.province' => 'required',
                'localisation_parent.district' => 'required',
                'localisation_parent.commune' => 'required',
                'nom_tuteur' => 'required',
                'tel_tuteur' => 'required|min:10',
                'addresse_tuteur.Numero' => 'required',
                'addresse_tuteur.Avenue' => 'required',
                'addresse_tuteur.Quartier' => 'required',
                'addresse_tuteur.Commune' => 'required',
            ]);
        } elseif ($this->currentStep == 3) {

            $this->validate([
                'diplomeEtat.Diplome' => 'required|min:10',
                'diplomeEtat.Numero' => 'required',
                'diplomeEtat.Mention' => 'required',
                'diplomeEtat.Section' => 'required',
                'diplomeEtat.DelivreA' => 'required',
                'diplomeEtat.DateDu' => 'required',

            ]);
        } elseif ($this->currentStep == 4) {

            $this->validate([
                'promotion' => 'required|',
                'faculte' => 'required|',
                'annee_academique' => 'required|'
            ]);
        }
    }
    public function register()
    {
        $this->resetErrorBag();

        if ($this->faculte == 2) {
            $matricule = Helper::IDgenaratorStudent(new Etudiant, 'matricule_etudiant', 4, 'PH');
        } elseif ($this->faculte == 1) {
            $matricule  = Helper::IDgenaratorStudent(new Etudiant, 'matricule_etudiant', 4, 'TH');
        } elseif ($this->faculte == 4) {
            $matricule  = Helper::IDgenaratorStudent(new Etudiant, 'matricule_etudiant', 4, 'SE');
        } else {
            $matricule  = Helper::IDgenaratorStudent(new Etudiant, 'matricule_etudiant', 4, 'CS');
        }

        if (!empty($matricule)) {
            $imageName = $matricule . $this->photo->getClientOriginalName();
            $upload_image = $this->photo->storeAs('public/students_images', $imageName);
            if ($upload_image) {
                $valueEtudiant = array(
                    "matricule_etudiant" => $matricule, "Nom" => $this->nom, 'PostNom' => $this->Postnom, 'Prenom' => $this->prenom,
                    'Genre' => $this->genre, 'email' => $this->email, 'etat_civil' => $this->etat_civil, 'nationalite' => $this->nationalite,
                    'lieu_naiss' => $this->lieu_naiss,
                    'date_naiss' => $this->date_naiss,
                    'telephone' => $this->telephone,
                    'adresse_etudiant' => json_encode($this->adresse),
                    'Nom_pere' => $this->nom_pere,
                    'Nom_mere' => $this->nom_mere,
                    'localisation_parent' => json_encode($this->localisation_parent),
                    'Photo' => $imageName,
                    'institut_religieux' => $this->institut_rel,
                    'sigle_rel' => $this->sigle,
                    'created_at' => Carbon::now(),
                );
                if ($valueEtudiant) {
                    $aptitude_physique = $matricule . 'aptPh' . $this->aptitude_physique->getClientOriginalName();
                    $this->upload_aptPh = $this->aptitude_physique->storeAs('public/students_doc', $aptitude_physique);
                    $certificat_naiss = $matricule . 'cert_Naiss' . $this->certificat_naiss->getClientOriginalName();
                    $this->upload_certificat = $this->certificat_naiss->storeAs('public/students_doc', $certificat_naiss);
                    $diplome_etat = $matricule . 'diplome' . $this->diplome_etat_doc->getClientOriginalName();
                    $this->upload_diplome = $this->diplome_etat_doc->storeAs('public/students_doc', $diplome_etat);
                    $bulletin = $matricule . 'bulletin' . $this->bulletin->getClientOriginalName();
                    $this->upload_bulletin = $this->bulletin->storeAs('public/students_doc', $bulletin);

                    $valuesTuteur = array(
                        "matricule_etudiant" => $matricule, "Nom_tuteur" => $this->nom_tuteur, "telephone_tuteur" => $this->tel_tuteur,
                        "adresse_tuteur" => json_encode($this->addresse_tuteur)
                    );
                    $valueDossier = array(
                        "matricule_etudiant" => $matricule,
                        "aptitude_physique" => $aptitude_physique,
                        "certificat_naiss" => $certificat_naiss,
                        "diplome_etat" => $diplome_etat,
                        "bulletin" => $bulletin
                    );
                    $etudesRealise = array(
                        "matricule_etudiant" => $matricule,
                        "Diplome_access" => json_encode($this->diplomeEtat),
                        "Cursus_univeristaire" => json_encode($this->cursus_universitaire)
                    );
                    $admis_inscription = array(
                        "matricule_etudiant" => $matricule,
                        "id_promotion" => $this->promotion,
                        "statut_etudiant" => $this->sigle,
                        "id_annee" =>  $this->annee_academique,
                    );

                    if (!empty($admis_inscription) && !empty($valueEtudiant) && !empty($valueDossier)) {
                        etudiant::insert($valueEtudiant);
                        dossierEtudiant::insert($valueDossier);
                        tuteuretudiant::insert($valuesTuteur);
                        etudeRealiser::insert($etudesRealise);
                        etudiantInscrit::insert($admis_inscription);
                    } else {
                        return redirect()->route('inscription')->with('status', "Error vos information n'ont pas ete soumis");
                    }
                }
            }
        } else {
            return redirect()->route('inscription')->with('status', "Error vos information n'ont pas ete soumis");
        }

        $data = ['name' => $this->nom . '-' . $this->Postnom, 'email' => $this->email, 'matricule' => $matricule];
        return redirect()->route('registration_complet', $data);
    }


    public function render()
    {
        return view('livewire.inscription',[
            'facultes' => Faculte::all(),
            'anneeAcademique' => anneeAcademique::OrderBy('id_annee', 'desc')->get(),
            'promotions' => Promotion::where('id_faculte', $this->faculte)->get(),
        ]);
    }
}
