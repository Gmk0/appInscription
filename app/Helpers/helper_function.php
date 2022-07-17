<?php

use App\Models\etudiant;

define("PAGELIST","Liste");
define("PAGECREATE","create");
define("PAGEEDIT","edit");
define("PROMOTION",1);
define("FACULTE","PH");


 function matricule()
{
    return  etudiant::pluck('matricule_etudiant')->last();

}
