<?php

namespace App\Models;
use App\Models\categorie;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
   public function categorie(){
    return $this->belongsTo(categorie::class);
   }

}
