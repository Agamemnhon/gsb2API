<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    protected $table = 'specialite';
    public $timestamp = false;
    protected $primaryKey = 'id_specialite';
    protected $fillable = ['id_specialite', 'lib_specialite'];

    public function praticiens() {
        return $this->belongsToMany('App\Models\Specialite', 'posseder','id_specialite', 'id_praticien')->withPivot('diplome', 'coef_prescription');
    }
}
