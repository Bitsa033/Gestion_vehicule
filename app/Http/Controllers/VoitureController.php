<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Http\Requests\StoreVoitureRequest;
use App\Http\Requests\UpdateVoitureRequest;
use Illuminate\Support\Facades\DB;

class VoitureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voitures=Voiture::all();

        return view("vehicule.index",[
            "voitures"=>$voitures
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("vehicule.create",[]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoitureRequest $request)
    {
        $mat=$request->get("matricule");
        $type=$request->get("marque");
        $prop=$request->get("phone");
        $descr=$request->get("descr");
        Voiture::create([
            "matricule"=>$mat,
            "type"=>$type,
            "proprietaire"=>$prop,
            "created_at"=>now(),
            "updated_at"=>now()
        ]);
        
        return redirect("create_vehicule");

    }

    /**
     * Display the specified resource.
     */
    public function show(Voiture $voiture)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function edit($id)
    {
        $voiture = DB::table('voitures')->where('id', $id)->first();
        return view("vehicule.edit",[
            'voiture'=>$voiture
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function update(UpdateVoitureRequest $request,$id)
    {
        $voiture = Voiture::findOrfail($id);
        $voiture->update([
            'matricule' => $request->get('matricule'),
            'type' => $request->get('marque'),
            'proprietaire' => $request->get('phone')
        ]);

        return redirect("index_vehicule")->with("success","Données modifiées avec succès");
        
    }


    /**
     * Show the form for creating a new resource.
     */
    public function destroy($id)
    {
        $voiture = Voiture::findOrfail($id);
        $voiture->delete();
        // return view("pages.deleteVehicule",[]);
        return redirect("index_vehicule")->with("delete","Données supprimées avec succès");
    }


}
