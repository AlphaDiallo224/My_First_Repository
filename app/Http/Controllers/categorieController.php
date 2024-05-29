<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class categorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorie =categorie::all();

        return view('Admin.categorie.index',compact('categorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorie=categorie::all()->WHERE('etat',1);
        return view('Admin.categorie.add',compact('categorie'));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
    //on stocke les categories qu'on ajoute dans save
    $save = new categorie;

    //enregistrement des donnes recuperer dans notre formulaire

    $save->nom_categorie = $request->nom_categorie;  
            
            if ($save->parent="") {
                $save->parent=0;
                $save->type=0;
            }else {
                $save->parent=$request->parent;
                $save->type=1;
            }

    //enregistrement dans la base de donnée
    $save-> save();

    //on retourne sur le formulaire en lui envoyant le message
    return back()->with('message', "categorie cree");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $nom_parents="";
        $categorie=categorie::findOrFail($id);
        $categories=categorie::all();
        $id_parent=$categorie->parent;
        $nom_parent=categorie::all()->where('id',$id_parent)->first();
        
        if($id_parent==0)
        {
            $nom_parents="";
            return view('Admin.categorie.view',compact('categorie','categories','nom_parents'));
        }
        else
        {
            $nom_parents=$nom_parent->nom_categorie ;
            return view('Admin.categorie.view',compact('categorie','categories','nom_parents'));
        }
    }

    public function activer($id){
        $categorie=categorie::findOrFail($id);
        if ($categorie->etat==0) {
            $categorie->etat=1;
            $message='categorie activer avec succes';
        } else {
            $categorie->etat=0;
            $message='categorie desactiver avec succes';
        }
         $categorie->save();
         return back()->with('message',$message);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $nom_parents="";

        $categorie=categorie::findOrFail($id);
        
        $categories=categorie::all();
        
        $id_parent=$categorie->parent;
        
        $nom_parent=categorie::all()->where('id',$id_parent)->first();
        
        if($id_parent==0)
        {

            $nom_parents="";
            return view('Admin.categorie.edit',compact('categorie','categories','nom_parents'));
        }
        else
        {
            $nom_parents=$nom_parent->nom_categorie ;
            return view('Admin.categorie.edit',compact('categorie','categories','nom_parents'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $categorie= categorie::find($id);

        $categorie->nom_categorie = $request->nom_categorie;

        if($categorie->parent="")
        {
            $categorie->parent= 0;
            $categorie ->type= 0;
        }
        else{
            $categorie->parent=$request->parent;
            $categorie->type=1;
        }

           
            $categorie-> save();

            $categorie =categorie::all();
            {
                return view('/Admin/categorie/index',compact('categorie'))->with('message',"la categorie a été modifier avec succes");
            }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //

        $categorie = categorie::findOrFail($id);
        var_dump($categorie);
        $message="";
        $erreur="";
        if($categorie->etat==0)
        {
            $message="categorie supprimé avec succés";
            $categorie -> delete();
        }
        else
        {
            $erreur= "suppresion categorie non autorisé";
        }

        if($message!="")
        {
            return BACK() -> with('message',$message);
        }
        else{
            return BACK() -> with('erreur',$erreur);
        }
    }
}
