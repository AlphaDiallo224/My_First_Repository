<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\Request;

class TemoignageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produits =Temoignage::all();
        return view('Admin.Temoignage.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $produits =Temoignage::all();
        return view('Admin.Temoignage.add',compact('produits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $save = new Temoignage();
        // dd($request->all());
        //
        $save->nom = $request->nom;
        $save->poste = $request->poste;
        $save->detail = $request->detail;
        $save->entreprise = $request->entreprise;
      
        //Enregistrement de l'image************
    
        // Vérifier si une image a été téléchargée
        if ($request->hasFile('images')) {
            // Stocker l'image dans le dossier
            $destinationPath = public_path('uploads/Temoignage/');
            $image = $request->file('images');
            $imageName = time().'.'.$image->extension();
            $image->move($destinationPath, $imageName);
    
            // Enregistrer le chemin de l'image dans la base de données
            $save->image = $imageName;
        } else {
            // Gérer le cas où aucune image n'a été téléchargée
            return redirect()->back()->with('error', 'Please select an image to upload.');
        }
        
    
         // Sauvegarder le produit dans la base de données
        $save->save();
        // Redirection  après le succès de l'enregistrement
        return redirect()->back()->with('message', 'Temoignage enregistré avec succes!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $clients=Temoignage::all()->where("id", $id) ->first();
        return view('Admin.Temoignage.view', compact('clients'));
    }

    public function activer(int $id){
        $produits = Temoignage::findOrFail($id);
        if ($produits->etat==0) {
            # code...
            $produits->etat = 1;
            $message = " Temoignage activer";
        }else{
            $produits->etat=0;
            $message='Temoignage desactive';
        }
        $produits->save();
        return back()->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Temoignage $id)
    {
        //

        $clients=Temoignage::findOrFail($id);
        return view('Admin.Temoignage.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Temoignage $temoignage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        //
        $produit=Temoignage::FindOrFail($id);
        $message="";
        $errors="";
        if ($produit->etat==0) {
            $message="Temoignage supprimer avec succes";
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
