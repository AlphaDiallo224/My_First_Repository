<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $expertises =Expertise::all();
        return view('Admin.Expertise.index',compact('expertises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $expertises =Expertise::all();
        return view('Admin.Expertise.add',compact('expertises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $save = new Expertise();

        $save->titre = $request->titre;
        $save->detail = $request->detail;

        //Enregistrement de l'image************

    // Vérifier si une image a été téléchargée
    if ($request->hasFile('images')) {
        // Stocker l'image dans le dossier
        $destinationPath = public_path('uploads/Expertise/');
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
    return redirect()->back()->with('message', 'Expertise enregistré avec succes!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $clients=Expertise::all()->where("id", $id) ->first();
        return view('Admin.Expertise.view', compact('clients'));
    }

    public function activer(int $id){
        $produits = Expertise::findOrFail($id);
        if ($produits->etat==0) {
            # code...
            $produits->etat = 1;
            $message = " Expertise activer";
        }else{
            $produits->etat=0;
            $message='Expertise desactive';
        }
        $produits->save();
        return back()->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $expertises=Expertise::findOrFail($id);
        return view('Admin.Expertise.edit', compact('expertises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $save=Expertise::findOrFail($id);
        // dd($request->all(), $save);

        $save->titre = $request->titre;

        $save->detail = $request->detail;

        if ($request->hasFile('image')) {
            // Stocker l'image dans le dossier
            $destinationPath = public_path('uploads/Expertise/');
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
        return back()->with('message','Expertise a ete modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $produit=Expertise::FindOrFail($id);
        $message="";
        $errors="";
        if ($produit->etat==0) {
            $message="Expertise supprimer avec succes";
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
