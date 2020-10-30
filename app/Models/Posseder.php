<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Posseder extends Model
{
    protected $table = 'posseder';
    public $timestamp = false;
    protected $fillable = ['id_praticien','id_specialite','diplome', 'coef_prescription'];

    public function praticien()
    {
        return $this->belongsTo('App\Models\Praticien', 'id_praticien','id_praticien');
    }

    public function specialite()
    {
        return $this->belongsTo('App\Models\Specialite','id_specialite', 'id_specialite');
    }

    /**
     * Surcharge toArray() de Model pour former
     * un tableau qui sera transformé en JSON
     * @return type tableau de propriétés
     */
    public function toArray() {
        $data = parent::toArray();
        $data['praticien'] = $this->praticien;
        $data['specialite'] = $this->specialite;
        return $data;
    }



}
