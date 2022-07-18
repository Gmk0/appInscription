<?php

namespace App\Http\Controllers;

use App\Models\etudiant;
use Illuminate\Http\Request;

use PDF;

class reporting extends Controller
{
    //
    public function formulaire($matricule)
    {
        $student = Etudiant::where('matricule_etudiant', $matricule)->first();

        if (!empty($student)) {
            $pdf = PDF::loadView('Pdf.formulaire', compact('student'));

            $pdf->setOption('no-stop-slow-scripts', true);
            //use $pdf->setOption('page-size', '');


            $pdf->setOption('lowquality', false);
            //$pdf->setOption('disable-smart-shrinking', true);
            return $pdf->download('formulaire.pdf');
        } else {
            return back('status');
        }
    }


}
