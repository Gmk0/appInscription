<?php

use App\Models\etudiant;
use App\Models\dossierEtudiant;

define("PAGELIST", "Liste");
define("PAGECREATE", "create");
define("PAGEEDIT", "edit");
define("PROMOTION", 2);
define("FACULTE", "TH");


function matricule()
{
    return  etudiant::pluck('matricule_etudiant')->last();
}

function countDocument($maricule)
{

    $dossier = dossierEtudiant::where('matricule_etudiant', $maricule)->first();
    if (!empty($dossier->Aptitude_physique) and !empty($dossier->Certificat_naiss) and !empty($dossier->Diplome_etat) && !empty($dossier->Bulletin) && !empty($dossier->recommandation)) {
        return true;
    } else {
        return false;
    };
}
