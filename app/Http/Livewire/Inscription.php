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
use App\Models\etatEcclesial;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;


class Inscription extends Component
{
    use WithFileUploads;

    //etudiant_element

    public $etudiant = [];

    public $adresse = [];
    public $institut = [];
    public $institut_rel;
    public $sigle;
    public $etat_eclesial;


    public $localisation_parent = [];
    public $photo;
    public $condition;
    //tuteur

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
    public $currentPage;
    public $ecclesiaste = false;


    public function mount()
    {
        $this->currentStep = 1;
        $this->currentPage = PAGEEDIT;
    }
    public function voirEclesiaste()
    {

        $this->ecclesiaste  = true;
    }
    public function DesactiverEclesiaste()
    {
        $this->ecclesiaste = false;
    }

    public function increaseStep()
    {
        $this->validateData();
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
    public function goInscription()
    {
        $this->validate([
            'condition' => 'accepted'
        ]);

        $this->currentPage = PAGELIST;
    }


    public function validateData()
    {
        $message = helper::messages();
        if ($this->currentStep == 1) {
            $this->validate([
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
                'adresse.Commune' => 'required|string',
            ], $message);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'etudiant.nom_pere' => 'required',
                'etudiant.nom_mere' => 'required',
                'localisation_parent.Province' => 'required',
                'localisation_parent.District' => 'required',
                'localisation_parent.Commune' => 'required',
                'etudiant.nom_tuteur' => 'required',
                'etudiant.tel_tuteur' => 'required|min:10',
                'addresse_tuteur.Numero' => 'required',
                'addresse_tuteur.Avenue' => 'required',
                'addresse_tuteur.Quartier' => 'required',
                'addresse_tuteur.Commune' => 'required',
            ], $message);
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
        $this->validate([
            'aptitude_physique' => 'required|mimes:doc,docx,pdf|max:1024',
            'diplome_etat_doc' => 'required|mimes:doc,docx,pdf|max:1024',
            'bulletin' => 'required|mimes:doc,docx,pdf|max:1024',
            'certificat_naiss' => 'required|mimes:doc,docx,pdf|max:1024',
            'photo' => 'required|mimes:jpeg,png,svg,jpg,gif|max:5000',
            'terms' => 'accepted'
        ]);

        if ($this->faculte == 1) {
            $matricule = Helper::IDgenaratorStudent(new Etudiant, 'matricule_etudiant', 4, 'PH');
        } elseif ($this->faculte == 2) {
            $matricule  = Helper::IDgenaratorStudent(new Etudiant, 'matricule_etudiant', 4, 'TH');
        } elseif ($this->faculte == 4) {
            $matricule  = Helper::IDgenaratorStudent(new Etudiant, 'matricule_etudiant', 4, 'SE');
        } else {
            $matricule  = Helper::IDgenaratorStudent(new Etudiant, 'matricule_etudiant', 4, 'CS');
        }

        if (!empty($matricule)) {
            $imageName = 'image' . time() . $this->photo->getClientOriginalName();
            $upload_image = $this->photo->storeAs('public/students_images', $imageName);
            if ($upload_image) {
                $valueEtudiant = array(
                    "matricule_etudiant" => $matricule, "Nom" => $this->etudiant['nom'], 'PostNom' => $this->etudiant['prenom'], 'Prenom' => $this->etudiant['prenom'],
                    'Genre' => $this->etudiant['genre'], 'email' => $this->etudiant['email'], 'etat_civil' => $this->etudiant['etat_civil'], 'nationalite' => $this->etudiant['nationalite'],
                    'lieu_naiss' => $this->etudiant['lieu_naiss'],
                    'date_naiss' => $this->etudiant['date_naiss'],

                    'telephone' => $this->etudiant['telephone'],
                    'adresse_etudiant' => json_encode($this->adresse),
                    'Nom_pere' => $this->etudiant['nom_pere'],
                    'Nom_mere' => $this->etudiant['nom_mere'],
                    'localisation_parent' => json_encode($this->localisation_parent),
                    'Photo' => $imageName,
                    'created_at' => Carbon::now(),
                );
                if ($valueEtudiant) {
                    $aptitude_physique = 'aptPh' . time() . $this->aptitude_physique->getClientOriginalName();
                    $this->upload_aptPh = $this->aptitude_physique->storeAs('public/students_doc', $aptitude_physique);
                    $certificat_naiss = 'cert_Naiss' . time() . $this->certificat_naiss->getClientOriginalName();
                    $this->upload_certificat = $this->certificat_naiss->storeAs('public/students_doc', $certificat_naiss);
                    $diplome_etat = 'diplome' . time() . $this->diplome_etat_doc->getClientOriginalName();
                    $this->upload_diplome = $this->diplome_etat_doc->storeAs('public/students_doc', $diplome_etat);
                    $bulletin = 'bulletin' . time() . $this->bulletin->getClientOriginalName();
                    $this->upload_bulletin = $this->bulletin->storeAs('public/students_doc', $bulletin);

                    $valuesTuteur = array(
                        "matricule_etudiant" => $matricule, "Nom_tuteur" => $this->etudiant['nom_tuteur'], "telephone_tuteur" => $this->etudiant['tel_tuteur'],
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
                    $etatReligieux = array(
                        "matricule_etudiant" => $matricule,
                        "institut" => $this->institut_rel,
                        "sigle" => $this->sigle,
                        "etat" => $this->etat_eclesial,
                    );

                    if (!empty($admis_inscription) && !empty($valueEtudiant) && !empty($valueDossier)) {
                        etudiant::insert($valueEtudiant);
                        dossierEtudiant::insert($valueDossier);
                        tuteuretudiant::insert($valuesTuteur);
                        etudeRealiser::insert($etudesRealise);
                        if (!empty($this->institut_rel) && !empty($this->sigle)) {
                            etatEcclesial::insert($etatReligieux);
                        };
                        etudiantInscrit::create($admis_inscription);
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
        return view('livewire.inscription.inscription', [
            'facultes' => Faculte::all(),
            'anneeAcademique' => anneeAcademique::orderBy('id_annee', 'desc')->get(),
            'promotions' => Promotion::where('id_faculte', $this->faculte)->get(),
        ]);
    }
    public function updated($propertyName)
    {
        $data = Helper::valideData();
        $messages = helper::messages();
        $this->validateOnly(
            $propertyName,
            $data,
            $messages
        );
    }
}
