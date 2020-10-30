<?php

namespace App\Http\Controllers;

use App\Models\Posseder;
use App\Models\Specialite;
use App\Models\Praticien;
use Illuminate\Http\Request;
use DB;

class PossederController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posseders = Posseder::all();
        return $posseders->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $praticien = Praticien::find($request->input('id_praticien'));

            $praticien->specialites()->attach($request->input('id_specialite'),[
                                                'diplome' => $request->input('diplome'),
                                                'coef_prescription'=> $request->input('coef_prescription')]);
            return response($praticien, 201);
        } catch(Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posseder  $posseder
     * @return \Illuminate\Http\Response
     */
    public function show($id_praticien, $id_specialite)
    {
        if($id_specialite == 0) {
            $posseders = Posseder::whereIn('id_praticien', [$id_praticien])->get();
            return response()->json($posseders, 200);
        } else if ($id_praticien == 0){
            $posseders = DB::table('posseder')->where('id_specialite', $id_specialite)->get();
            return response()->json($posseders, 200);
        } else {
            $posseder = Posseder::where([
            ['id_praticien', '=', $id_praticien],
            ['id_specialite', '=', $id_specialite],
            ])->get();

            $possede = new Posseder();
            foreach ($posseder as $poss) {
                $possede = $poss;
            }
            return response()->json($possede, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posseder  $posseder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $praticien = Praticien::find($request->input('id_praticien'));
            $praticien->specialites()->detach($request->input('id_specialite'));
            $praticien->specialites()->attach($request->input('id_specialite'),[
                'diplome' => $request->input('diplome'),
                'coef_prescription'=> $request->input('coef_prescription')]);
            return response()->json('cooooool', 200);
        } catch (Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $praticien = Praticien::find($request->input('id_praticien'));
            $praticien->specialites()->detach($request->input('id_specialite'));
            return response()->json(null, 204);
        } catch(Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }
    /* Sauvegarde de la fonction show du possedercontroller

    public function show($id_praticien, $id_specialite)
    {
        if($id_specialite == 0) {
            $posseder = DB::table('posseder')
                            ->where('id_praticien', $id_praticien)
                            ->join('specialite', 'specialite.id_specialite', '=', 'posseder.id_specialite')
                            ->get();
            return response()->json($posseder, 200);
        } else if ($id_praticien == 0){
            $posseders = DB::table('posseder')->where('id_specialite', $id_specialite)->get();
            return response()->json($posseders, 200);
        } else {
            $posseders = DB::table('posseder')->where([
            ['id_praticien', '=', $id_praticien],
            ['id_specialite', '=', $id_specialite],
            ])->get();
            return response()->json($posseders, 200);
        }
    }
    */


}
