<?php

use App\Models\etudiant;

define("PAGELIST","Liste");
define("PAGECREATE","create");
define("PAGEEDIT","edit");
define("PROMOTION",4);
define("FACULTE","SE");


 function matricule()
{
    return  etudiant::pluck('matricule_etudiant')->last();

}
