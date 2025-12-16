<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function Pest\Laravel\get;

class EtudiantController extends Controller
{
    public function __construct()
    {
       if (!Session::get('personnes')) {
           $personnes = [];
           Session::put('personnes', $personnes);
       }
    }
    public function ajouter()
    {
        return view('etudiant.create');
    }
    public function liste()
    {
        $personnes = Session::get('personnes');
        return view('etudiant.liste',compact('personnes'));
    }
     public function store(Request $request)
    {
        $personnes = Session::get('personnes');
        $prenom = $request->prenom;
        array_push($personnes, $prenom);

        session::put('personnes', $personnes);
        return redirect('/liste');
       
    }
    public function update(Request $request)
    { 
        $personnes = Session::get('personnes');
        $prenomold = $request->prenomold;
        $prenomnew = $request->prenom;

        $index = array_search($prenomold, $personnes);
        if ($index !== false) {
            $personnes[$index] = $prenomnew;
        }

        Session::put('personnes', $personnes);
        return redirect('/liste');
    }

}


?>