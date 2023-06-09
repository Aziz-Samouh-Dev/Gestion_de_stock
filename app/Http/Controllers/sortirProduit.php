<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Produit;
use App\Models\Service;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class sortirProduit extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $divisions = Division::all();
        $services = Service::all();
        $agents = Agent::all();
        $produits = Produit::all();

        return view('layout.SortieProoduit.sortirProduit', compact('divisions', 'services', 'agents', 'produits'));
    }

    public function getServices(Request $request)
    {
        $divisionId = $request->input('division_id');
        $services = Service::join('division_service', 'services.id_service', '=', 'division_service.id_service')
        ->where('division_service.id_division', $divisionId)
            ->get();

        return response()->json($services);
    }

    public function getAgents(Request $request)
    {
        $serviceId = $request->input('service_id');

        $agents = DB::table('agents')
        ->join('agent_service', 'agents.id_agent', '=', 'agent_service.id_agent')
        ->where('agent_service.id_service', $serviceId)
            ->select('agents.id_agent', 'agents.nom_agent')
            ->get();

        return response()->json($agents);
    }

    public function getProducts(Request $request)
    {
        $agentId = $request->input('agent_id');

        $products = Produit::where('agent_id', $agentId)->get();
        return response()->json($products);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $product = Produit::where('id_produit', $request->id)->first();
        Produit::where('id_produit', $request->id)->update(['qte_p' => $product->qte_p - $request->quantity]);

        return redirect('produits')->with('flash_message', 'Produit à été modifier!');
    }

}
