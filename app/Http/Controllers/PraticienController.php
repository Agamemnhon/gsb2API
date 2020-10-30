<?php

namespace App\Http\Controllers;
use App\Models\Praticien;
use App\Models\Specialite;
use Session;
use Request;
use DB;
use App\Http\Controllers\PossederController;

class PraticienController extends Controller
{
    public function index()
    {
        $praticiens = Praticien::all();
        return $praticiens->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* public function store(Request $request)
    {
        Praticien::create($request->all());
    }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Praticien  $praticien
     * @return \Illuminate\Http\Response
     */
    public function show($id_praticien)
    {
        $praticien = Praticien::find($id_praticien);
        return $praticien->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Praticien  $praticien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Praticien $praticien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Praticien  $praticien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Praticien $praticien)
    {
        //
    }

    public function pratBySpec($id_specialite){
        try {
            $specialite = Specialite::find($id_specialite);
            $tablePivot = $specialite->praticiens;
            $idPraticiens=[];
            foreach($tablePivot as $pivot){
                $idPraticiens[]=$pivot->pivot->id_praticien ;
            };
            $praticiens = Praticien::all()->intersect(Praticien::whereIn('id_praticien', $idPraticiens)->get());
            if ($praticiens->first()){
                return response()->json($praticiens, 200);
            } else {
                return response()->json(null, 404);
            }
        } catch(Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }

    public function pratByName (String $nom){
        try{
            $praticiens = Praticien::where('nom_praticien', $nom)->get();
            if ($praticiens->first()){
                return response()->json($praticiens, 200);
            } else {
                return response()->json(null, 404);
            }
        } catch (Exception $ex){
            return response()->json($ex->getMessage, 500);
        }
    }
}
