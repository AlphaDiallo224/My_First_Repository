<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produits =Equipe::all();
        return view('Admin.Equipe.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $produits =Equipe::all();
        return view('Admin.Equipe.add',compact('produits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = new Equipe();
        // dd($request->all());
        //
        $save->nom = $request->nom;
        $save->prenom = $request->prenom;
      
        //Enregistrement de l'image************
    
        // Vérifier si une image a été téléchargée
        if ($request->hasFile('images')) {
            // Stocker l'image dans le dossier
            $destinationPath = public_path('uploads/Equipe/');
            $image = $request->file('images');
            $imageName = time().'.'.$image->extension();
            $image->move($destinationPath, $imageName);
    
            // Enregistrer le chemin de l'image dans la base de données
            $save->image = $imageName;
        } else {
            // Gérer le cas où aucune image n'a été téléchargée
            return redirect()->back()->with('error', 'Please select an image to upload.');
        }
        $save->poste = $request->poste;
    
         // Sauvegarder le produit dans la base de données
        $save->save();
        // Redirection  après le succès de l'enregistrement
        return redirect()->back()->with('message', 'Equipe enregistré avec succes!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $clients=Equipe::all()->where("id", $id) ->first();
        return view('Admin.Equipe.view', compact('clients'));
    }

    public function activer(int $id){
        $produit = Equipe::findOrFail($id);
        if ($produit->etat==0) {
            # code...
            $produit->etat = 1;
            $message = " Equipe activer";
        }else{
            $produit->etat=0;
            $message='Equipe desactive';
        }
        $produit->save();
        return back()->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $expertises=Equipe::findOrFail($id);
        return view('Admin.Equipe.edit', compact('expertises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $save=Equipe::findOrFail($id);
        // dd($request->all(), $save);

        $save->nom = $request->nom;

        $save->prenom = $request->prenom;
        $save->poste = $request->poste;

        if ($request->hasFile('image')) {
            // Stocker l'image dans le dossier
            $destinationPath = public_path('uploads/Equipe/');
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move($destinationPath, $imageName);
    
            // Enregistrer le chemin de l'image dans la base de données
            $save->image = $imageName;
        } else {
            // Gérer le cas où aucune image n'a été téléchargée
            return redirect()->back()->with('error', 'Please select an image to upload.');
        }

        $save-> save();
        return back()->with('message','Equipe modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $produit=Equipe::FindOrFail($id);
        $message="";
        $errors="";
        if ($produit->etat==0) {
            $message="Equipe supprimer avec succes";
            $produit->delete();
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
