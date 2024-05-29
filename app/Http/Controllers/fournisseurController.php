<?php

namespace App\Http\Controllers;

use App\Models\fournisseur;
use Illuminate\Http\Request;

class fournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //on recupere tous ce qui est dans la table fournisseur
        return view('Admin.fournisseur.index',['fournisseurs' =>fournisseur::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // composer requiert intervention/images. php artisan storage:link
        return view('Admin.fournisseur.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
          //dd($request);
        fournisseur::create([   'nom' =>$request->nom,
                                'prenom'=>$request->prenom,
                                'memail'=>$request->email,
                                'tel'=>$request->tel,
                                'adresse'=>$request->adresse,
                                'email'=>$request->email,
                                'nom_entreprise'=>$request->nom_entreprise,
                                'specialite'=>$request->specialite,
                                'deletable'=>0,
                                'etat'=>1
                             ]);
                        return to_route('fournisseur.index')->with('message','le fournisseur a ete cree avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $fournisseurs=fournisseur::all()->where("id", $id) ->first();
        return view('Admin.fournisseur.view', compact('fournisseurs'));

        
    }

    public function activer($id){
        $fournisseur=fournisseur::findOrFail($id);
        if ($fournisseur->etat==0) {
            $fournisseur->etat=1;
            $message='fournisseur activer avec succes';
        } else {
            $fournisseur->etat=0;
            $message='fournisseur desactiver avec succes';
        }
         $fournisseur->save();
         return back()->with('message',$message);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
   
            // dd($fournisseur);
            $fournisseurs=fournisseur::findOrFail($id);
            return view('Admin.fournisseur.edit', compact('fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $fournisseurs=fournisseur::find($id);

        $fournisseurs->nom = $request->nom;  

        $fournisseurs->prenom = $request->prenom;

        $fournisseurs->email = $request->email;

        $fournisseurs->tel = $request->tel;

        $fournisseurs->adresse = $request->adresse;

        $fournisseurs->nom_entreprise = $request->nom_entreprise;

        $fournisseurs->specialite = $request->specialite;

        $fournisseurs-> save();
        return back()->with('message','Le fournisseur a ete modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $fournisseur=fournisseur::FindOrFail($id);
        $message="";
        $errors="";
        if ($fournisseur->etat==0) {
            $message="fournisseur supprimer avec succes";
            $fournisseur->delete();
        }
        else {
            $errors="suppression non autorise";
        }
        if ($message!="") {
            return back()->with("message", $message);
        }
        else {
            return back()->with("errors", $errors);
        }
    }
}
