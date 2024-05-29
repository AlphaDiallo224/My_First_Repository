<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $slides = Slide::all();

        return view('Admin.Slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.Slide.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // On stocke  qu'on ajoute dans save
    $save = new Slide;
        //

        $save->nom = $request->nom;
        $save->url1 = $request->url1;
        $save->url2 = $request->url2;
        $save->message1 = $request->message1;
        $save->message2 = $request->message2;
        
         //Enregistrement de l'image************

    // Vérifier si une image a été téléchargée
    if ($request->hasFile('images')) {
        // Stocker l'image dans le dossier
        $destinationPath = public_path('uploads/slide/');
        $image = $request->file('images');
        $imageName = time().'.'.$image->extension();
        $image->move($destinationPath, $imageName);

        // Enregistrer le chemin de l'image dans la base de données
        $save->image = $imageName;
    } else {
        // Gérer le cas où aucune image n'a été téléchargée
        return redirect()->back()->with('error', '.');
    }

     // Sauvegarder dans la base de données
     $save->save();
     // Redirection  après le succès de l'enregistrement
     return redirect()->back()->with('message', ' enregistré avec succes!');


}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $slides=Slide::all()->where("id", $id) ->first();
        return view('Admin.slide.view', compact('slides'));
    }

    public function activer(int $id){
        $slide = Slide::findOrFail($id);
        if ($slide->etat==0) {
            # code...
            $slide->etat = 1;
            $message = " slide activer";
        }else{
            $slide->etat=0;
            $message='slide desactive';
        }
        $slide->save();
        return back()->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //
        $clients=Slide::findOrFail($id);
        return view('Admin.Slide.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $save=Slide::findOrFail($id);
        // dd($request->all(), $save);

        $save->nom = $request->nom;
        $save->url1 = $request->url1;
        $save->url2 = $request->url2;
        $save->message1 = $request->message1;
        $save->message2 = $request->message2;

        if ($request->hasFile('image')) {
            // Stocker l'image dans le dossier
            $destinationPath = public_path('uploads/Slide/');
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
        return back()->with('message','Slide a ete modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $slides=Slide::FindOrFail($id);
        $message="";
        $errors="";
        if ($slides->etat==0) {
            $message="slides supprimer avec succes";
            $slides->delete();
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
