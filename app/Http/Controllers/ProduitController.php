<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Produit;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //on recupére tous les produits dans notre base de données on les affiches
        $produits =Produit::all();
        return view('Admin.produit.index',compact('produits'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $produits =User::all();
        $products =categorie::all();
        return view('Admin.produit.add',compact('produits','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // On stocke les produits qu'on ajoute dans save
    $save = new Produit;

    // methode pour faire la reference
    $exe = date('y');
    $date = substr($exe, 2);
    $zero = "00000";
    $numero = "REF$date";
    $nombre = Produit::all()->count();
    $nombre++;
    if ($nombre < 10) 
        $zero = substr($zero, 0, strlen($zero) - 1);
    else if ($nombre > 100)
        $zero = substr($zero, 0, strlen($zero) - 2);
    else
        $zero = substr($zero, 0, strlen($zero) - 3);

    $numero .= $zero . $nombre;

    $save->references = $numero;
    $save->nomProduit = $request->nomProduit;
    $save->categorie = $request->categorie;
    $save->seuil = $request->seuil;
    $save->qte = $request->qte;
    $save->pu = $request->pu;
    $save->description = $request->description;

   // Récupérer l'utilisateur connecté directement depuis la session
//     $user = Auth::user(); 
// if ($user) {
//     $save->user_id = $user->id;
// } else {
//     // Rediriger l'utilisateur vers la page de connexion
//     return redirect()->route('login')->with('error', 'Veuillez vous connecter pour effectuer cette action.');
// }

// recuperation des categorie depuis le model categorie
    $categories= categorie::all();
    foreach ($categories as $categorie){
    $save->categorie = $categorie->id;}

    //Enregistrement de l'image************

    // Vérifier si une image a été téléchargée
    if ($request->hasFile('images')) {
        // Stocker l'image dans le dossier
        $destinationPath = public_path('uploads/produit/');
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
    return redirect()->back()->with('message', 'Produit enregistré avec succes!');

    
}

    

    /**
     * Display the specified resource.
     */
    public function show ($id)
    {
        //
        $clients=Produit::all()->where("id", $id) ->first();
        return view('Admin.produit.view', compact('clients'));
    }

    
    public function activer(int $id){
        $produits = Produit::findOrFail($id);
        if ($produits->etat==0) {
            # code...
            $produits->etat = 1;
            $message = " produits activer";
        }else{
            $produits->etat=0;
            $message='produits desactive';
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
        $clients=Produit::findOrFail($id);
        return view('Admin.produit.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $id)
    {
        //
        $clients=Produit::find($id);

        $clients->reference = $request->reference;  

        $clients->nomProduit = $request->nomProduit;

        $clients->categorie = $request->categorie;

        $clients->seuil = $request->seuil;

        $clients->qte = $request->qte;

        $clients->pu = $request->pu;

        $clients->description = $request->description;
        $clients-> save();
        return back()->with('message','Le Produit a ete modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $produit=Produit::FindOrFail($id);
        $message="";
        $errors="";
        if ($produit->etat==0) {
            $message="produit supprimer avec succes";
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
