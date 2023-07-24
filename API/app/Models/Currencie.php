<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currencie extends Model
{

    protected $table = 'currencies';

    // Définir la relation "hasMany" vers le modèle Paires
    public function pairsSource()
    {
        return $this->hasMany(Pair::class, 'devise_source_id');
    }

    public function pairsCible()
    {
        return $this->hasMany(Pair::class, 'devise_cible_id');
    }
}
