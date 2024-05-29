<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $expertises =Partenaire::all();
        return view('Admin.Partenaire.index',compact('expertises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $expertises =Partenaire::all();
        return view('Admin.Partenaire.add',compact('expertises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $save = new Partenaire();

        $save->nom = $request->nom;
        

        //Enregistrement de l'image************

    // Vérifier si une image a été téléchargée
    if ($request->hasFile('images')) {
        // Stocker l'image dans le dossier
        $destinationPath = public_path('uploads/Partenaire/');
        $image = $request->file('images');
        $imageName = time().'.'.$image->extension();
        $image->move($destinationPath, $imageName);

        // Enregistrer le chemin de l'image dans la base de données
        $save->image = $imageName;
    } else {
        // Gérer le cas où aucune image n'a été téléchargée
        return redirect()->back()->with('error', 'Please select an image to upload.');
    }

     // Sauvegarder le Expertise dans la base de données
    $save->save();
    // Redirection  après le succès de l'enregistrement
    return redirect()->back()->with('message', 'Partenaire enregistré avec succes!');

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $clients=Partenaire::all()->where("id", $id) ->first();
        return view('Admin.Partenaire.view', compact('clients'));
    }

    public function activer(int $id){
        $produits = Partenaire::findOrFail($id);
        if ($produits->etat==0) {
            # code...
            $produits->etat = 1;
            $message = " Partenaire activer";
        }else{
            $produits->etat=0;
            $message='Partenaire desactive';
        }
        $produits->save();
        return back()->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $expertises=Partenaire::findOrFail($id);
        return view('Admin.Partenaire.edit', compact('expertises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        
        $save=Partenaire::findOrFail($id);
        // dd($request->all(), $save);

        $save->nom = $request->nom;

    

        if ($request->hasFile('image')) {
            // Stocker l'image dans le dossier
            $destinationPath = public_path('uploads/Partenaire/');
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
        return back()->with('message','partenaire a ete modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $produit=Partenaire::FindOrFail($id);
        $message="";
        $errors="";
        if ($produit->etat==0) {
            $message="Partenaire supprimer avec succes";
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
