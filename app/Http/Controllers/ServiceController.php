<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgentService;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function index()
    // {
    //     $services = Service::with('agents')->get();
    //     return view('layout.Service.services', compact('services'));
    // }

    public function index()
    {
        $services = Service::with('agents')->get()->groupBy('id_service');


        return view('layout.Service.services', compact('services'));
    }


    public function create()
    {
        //
        $agents = Agent::all();
        $services = Service::all();
        return view('layout.Service.ajouteService', compact('services', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'nom_service' => 'required|string|max:255',
    //         'nom_agent' => 'required|array',
    //         'nom_agent.*' => 'exists:agents,id_agent', // Assuming "agents" is the table name for the agents
    //     ]);

    //     // Store the service
    //     $service = new Service();
    //     $service->nom_service = $validatedData['nom_service'];
    //     $service->save();

    //     // Attach the selected agents to the service
    //     $service->agents()->attach($validatedData['nom_agent']);

    //     // Redirect or return a response as needed
    //     // Example:
    //     return redirect()->back()->with('success', 'Service created successfully.');
    // }

    // public function store(Request $request)
    // {
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'nom_service' => 'required|string|max:255',
    //         'nom_agent' => 'required|array',
    //         'nom_agent.*' => 'exists:agents,id_agent',
    //     ]);

    //     // Store the service
    //     $service = new Service();
    //     $service->nom_service = $validatedData['nom_service'];
    //     $service->save();

    //     // Attach the selected agents to the service
    //     $service->agents()->attach($validatedData['nom_agent']);

    //     // Redirect to a route or return a response as needed
    //     // Example:
    //     return redirect()->back()->with('success', 'Service created successfully.');
    // }


    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nom_service' => 'required|string|max:255',
            'id_agent' => 'required|array',
        ]);

        // Create a new service
        $service = new Service();
        $created_service = $service->create([
            "nom_service" => $validatedData['nom_service'],
        ]);

        // Attach the selected agents to the service
        foreach ($validatedData['id_agent'] as $item) {
            $agent_service = new AgentService();
            $created_service = $agent_service->create([
                "id_service" => $created_service->id_service,
                "id_agent" => $item,
            ]);
        }
        return redirect()->route('services.create')->with('success', 'Service created successfully.');

        // Redirect back to the form with a success message
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Service::where('id_service', $id)->delete();
        return redirect('services')->with('lash_message', 'services deleted!');
    }
}
