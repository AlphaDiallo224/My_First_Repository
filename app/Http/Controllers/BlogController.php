<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produits =Blog::all();
        return view('Admin.Blog.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $produits =Blog::all();
        return view('Admin.Blog.add',compact('produits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $save = new Blog();
        // dd($request->all());
        //
        $save->nom = $request->nom;
        $save->titre = $request->titre;
        $save->detail = $request->detail;
      
        //Enregistrement de l'image************
    
        // Vérifier si une image a été téléchargée
        if ($request->hasFile('images')) {
            // Stocker l'image dans le dossier
            $destinationPath = public_path('uploads/Blog/');
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
        return redirect()->back()->with('message', 'Blog enregistré avec succes!');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $clients=Blog::all()->where("id", $id) ->first();
        return view('Admin.Blog.view', compact('clients'));
    }

    public function activer(int $id){
        $produit = Blog::findOrFail($id);
        if ($produit->etat==0) {
            # code...
            $produit->etat = 1;
            $message = " Blog activer";
        }else{
            $produit->etat=0;
            $message='Blog desactive';
        }
        $produit->save();
        return back()->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $expertises=Blog::findOrFail($id);
        return view('Admin.Blog.edit', compact('expertises'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $save=Blog::findOrFail($id);
        // dd($request->all(), $save);

        $save->nom = $request->nom;

        $save->titre = $request->titre;
        $save->detail = $request->detail;

        if ($request->hasFile('image')) {
            // Stocker l'image dans le dossier
            $destinationPath = public_path('uploads/Blog/');
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
        return back()->with('message','Blog modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $produit=Blog::FindOrFail($id);
        $message="";
        $errors="";
        if ($produit->etat==0) {
            $message="Blog supprimer avec succes";
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
