<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperfournisseur
 */
class fournisseur extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'prenom',
        'email',
        'tel',
        'adresse',
        'nom_entreprise',
        'specialite',
        'etat',
        'deletable',


    ];
}
