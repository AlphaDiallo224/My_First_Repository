<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Pub;
use Illuminate\Http\Request;

class PubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pubs =Pub::all();
        return view('Admin.Pub.index',compact('pubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        $pubs =Page::all();
        return view('Admin.Pub.add',compact('pubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = new Pub;
        //
        
        $save->nom = $request->nom;
    

    //Enregistrement de l'image************

    // Vérifier si une image a été téléchargée
    if ($request->hasFile('images')) {
        // Stocker l'image dans le dossier
        $destinationPath = public_path('uploads/Pub/');
        $image = $request->file('images');
        $imageName = time().'.'.$image->extension();
        $image->move($destinationPath, $imageName);

        // Enregistrer le chemin de l'image dans la base de données
        $save->image = $imageName;
    } else {
        // Gérer le cas où aucune image n'a été téléchargée
        return redirect()->back()->with('error', 'Please select an image to upload.');
    }

    $save->position = $request->position;

    $pubs= Page::all();
    foreach ($pubs as $pub)
    {$save->page_id = $pub->id;}

     // Sauvegarder la page dans la base de données
    $save->save();
    // Redirection  après le succès de l'enregistrement
    return redirect()->back()->with('message', 'pub enregistré avec succes!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $clients=Pub::all()->where("id", $id) ->first();
        return view('Admin.Pub.view', compact('clients'));
    }

    public function activer(int $id){
        $produits = Pub::findOrFail($id);
        if ($produits->etat==0) {
            # code...
            $produits->etat = 1;
            $message = " pub activer";
        }else{
            $produits->etat=0;
            $message='pub desactive';
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
        $clients=Pub::findOrFail($id);
        return view('Admin.Pub.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $save=Pub::findOrFail($id);
        // dd($request->all(), $save);

        $save->nom = $request->nom;
        $save->position = $request->position;
        

        if ($request->hasFile('image')) {
            // Stocker l'image dans le dossier
            $destinationPath = public_path('uploads/Pub/');
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
        return back()->with('message','Pub a ete modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pub $id)
    {
        //
        $produit=Pub::FindOrFail($id);
        $message="";
        $errors="";
        if ($produit->etat==0) {
            $message="pub supprimer avec succes";
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
