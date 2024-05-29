<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Pub;
use App\Models\page;

class AccueilController extends Controller
{
    //
    public function Accueil(){
        $slides = Slide::all()->where('etat',1);
        return view('Front.page.main',compact('slides'));
    }

    // public function about(){
    //     $slides = Slide::all()->where('etat',1);
    //     return view('Front.page.about',compact('slides'));
    // }

    public function service(){
        // $slides = Expertise::all()->where('etat',1);
        // return view('Front.page.service',compact('slides'));
        return view('Front.page.service');
    }
}
