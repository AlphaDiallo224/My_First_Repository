<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pages =Page::all();

        return view('Admin.Page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.Page.add');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new Page();

        $save->nom = $request->nom;
        $save->url = $request->url;
        $save->contenu = $request->contenu;
       

        //Enregistrement de l'image************

    // Vérifier si une image a été téléchargée
    if ($request->hasFile('images')) {
        // Stocker l'image dans le dossier
        $destinationPath = public_path('uploads/Pages/');
        $image = $request->file('images');
        $imageName = time().'.'.$image->extension();
        $image->move($destinationPath, $imageName);

        // Enregistrer le chemin de l'image dans la base de données
        $save->image = $imageName;
    } else {
        // Gérer le cas où aucune image n'a été téléchargée
        return redirect()->back()->with('error', 'Please select an image to upload.');
    }

     // Sauvegarder la pages dans la base de données
    $save->save();
    // Redirection  après le succès de l'enregistrement
    return redirect()->back()->with('message', 'pages enregistré avec succes!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $clients=Page::all()->where("id", $id) ->first();
        return view('Admin.Page.view', compact('clients'));
    }

    public function activer(int $id){
        $produits = Page::findOrFail($id);
        if ($produits->etat==0) {
            # code...
            $produits->etat = 1;
            $message = " page activer";
        }else{
            $produits->etat=0;
            $message='page desactive';
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
        $clients=Page::findOrFail($id);
        return view('Admin.Page.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $save=Page::findOrFail($id);
        $save->nom = $request->nom;  
        $save->url = $request->url;
        $save->contenu = $request->contenu;
        if ($request->hasFile('image')) {
            // Stocker l'image dans le dossier
            $destinationPath = public_path('uploads/Pges/');
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
      
      
        return back()->with('message','La page a ete modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $page=Page::FindOrFail($id);
        $message="";
        $errors="";
        if ($page->etat==0) {
            $message="Page supprimer avec succes";
            $page->delete();
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
