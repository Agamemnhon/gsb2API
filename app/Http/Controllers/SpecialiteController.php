<?php

namespace App\Http\Controllers;
use Session;
use Request;
use App\Models\Specialite;
use App\Models\Praticien;
use Validator;

class SpecialiteController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialites = Specialite::all();
        return $specialites->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function show($id_praticien, $id_specialite)
    {
        if ($id_praticien > 0 ){
            this.getSpecialitesPrat($id_praticien);
        } else {
            $specialite = Specialite::find($id_specialite)->get();
            return $specialite->toJson($specialite, 200);
        }

    }

    public function getSpecialite($id_specialite){
        $specialite = Specialite::find($id_specialite);
        return response()->json($specialite, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialite $specialite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialite $specialite)
    {
        //
    }

    /**
     * Récupère un tableau de spécialité pour un praticien
     * @param id_praticien
     * @return response Json contenant un tableau des spécialités de ce praticien
     *                  le tableau sera vide s'il n'en possède pas
     */

    public function getSpecialitesPrat($id_praticien){
        try {
            $praticien = Praticien::find($id_praticien);
            $tablePivot = $praticien->specialites;
            $idSpecialite=[];
            foreach($tablePivot as $pivot){
                $idSpecialite[]=$pivot->pivot->id_specialite ;
            };
            $specialites = Specialite::all()->intersect(Specialite::whereIn('id_specialite', $idPraticiens)->get());
                return response()->json($specialites, 200);

            } catch(Exception $ex) {
                return response()->json($ex->getMessage(), 500);
            }
    }
}
