<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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
        $clients=Client::all();

        return view("client.index",[
            "clients"=>$clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("client.create",[]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $name=$request->get("name");
        $phone=$request->get("phone");
        $address=$request->get("address");
        Client::create([
            "name"=>$name,
            "phone"=>$phone,
            "address"=>$address,
            "created_at"=>now(),
            "updated_at"=>now()
        ]);
        
        return redirect("create_client");
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = DB::table('clients')->where('id', $id)->first();
        return view("client.edit",[
            'client'=>$client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, $id)
    {
        $client = Client::findOrfail($id);
        $client->update([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address')
        ]);

        return redirect("index_client")->with("success","Données modifiées avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = Client::findOrfail($id);
        $client->delete();
        // return view("pages.deleteVehicule",[]);
        return redirect("index_client")->with("delete","Données supprimées avec succès");
    }
}
