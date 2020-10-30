<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Praticien extends Model
{
    protected $table = 'praticien';
    public $timestamp = false;
    protected $primaryKey = 'id_praticien';
    protected $fillable = ['id_praticien', 'id_type_praticien', 'code_praticien', 'nom_praticien', 'prenom_praticien', 'adresse_praticien', 'cp_praticien', 'ville_praticien', 'coef_notoriete'];

    public function specialites() {
        return $this->belongsToMany('App\Models\Specialite', 'posseder', 'id_praticien','id_specialite')->withPivot('diplome', 'coef_prescription');
    }
}
