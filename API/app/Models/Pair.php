<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{

    protected $table = 'pairs';

    // Définir la relation "belongsTo" vers le modèle Currencie
    public function currencieSource()
    {
        return $this->belongsTo(Currencie::class, 'currencie_source_id');
    }

    public function currencieCible()
    {
        return $this->belongsTo(Currencie::class, 'currencie_cible_id');
    }
}
