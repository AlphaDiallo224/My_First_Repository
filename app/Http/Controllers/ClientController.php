<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //on recupére tous clients dans notre model client qui sont actifs et on les affiches
        $clients =Client::all();

        return view('Admin.Client.index',compact('clients'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Client.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //on déclare la variable message
    $message = 'Le client a été créé avec succès';
     
        //on stocke les clients qu'on ajoute dans save
        $save = new Client;

        //enregistrement des donnes recuperer dans notre formulaire

        $save->nom = $request->nom;  

        $save->prenom = $request->prenom;

        $save->email = $request->email;

        $save->telephone = $request->telephone;

        $save->adresse = $request->adresse;

        $save->deletable = 0;
        
        $save->etat = 1;

        //enregistrement dans la base de donnée
        $save-> save();

        return back()->with('message','le client a ete cree avec succes');
            
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clients=Client::all()->where("id", $id) ->first();
        return view('Admin.Client.view', compact('clients'));
    }

  public function activer($id){
        $client=Client::findOrFail($id);
        if ($client->etat==0) {
            $client->etat=1;
            $message='client activer avec succes';
        } else {
            $client->etat=0;
            $message='client desactiver avec succes';
        }
         $client->save();
         return back()->with('message',$message);


    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clients=Client::findOrFail($id);
        return view('Admin.Client.edit', compact('clients'));
        
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $clients=Client::find($id);

        $clients->nom = $request->nom;  

        $clients->prenom = $request->prenom;

        $clients->email = $request->email;

        $clients->telephone = $request->telephone;

        $clients->adresse = $request->adresse;
        $clients-> save();
        return back()->with('message','Le client a ete modifie avec succes');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $fourniseur=Client::FindOrFail($id);
        $message="";
        $errors="";
        if ($fourniseur->etat==0) {
            $message="client supprimer avec succes";
            $fourniseur->delete();
        }
        else {
            $errors="suppression client non autorise";
        }
        if ($message!="") {
            return back()->with("message", $message);
        }
        else {
            return back()->with("errors", $errors);
        }
    }
}
