<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();
        return view('layout.Produit.produits')->with('produits', $produits);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('layout.Produit.ajouteProduit');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    //     $input = $request->all();
    //     Produit::create($input);
    //     return redirect('produits')->with('flash_message', 'produit Ajouté !');
    // }
    public function store(Request $request)
    {
        $input = $request->except('_token');

        // Generate a random auto-incremented ref_p value
        $randomNumber = mt_rand(1, 999999); // Generate a random 3-digit number
        $input['ref_p'] = 'Prod-'  . str_pad($randomNumber + 1, 3, '0', STR_PAD_LEFT);


        Produit::create($input);

        return redirect('produits')->with('flash_message', 'Produit ajouté !');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $produit = Produit::where('id_produit', $id)->first();
        return view('layout.Produit.view')->with('produits', $produit);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $produit = Produit::where('id_produit', $id)->first();
        return view('layout.Produit.edit')->with('produits', $produit);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $produit = Produit::where('id_produit', $id);
    //     if (!$produit) {
    //         return redirect('produits')->with('flash_message', 'Produit non trouvé!');
    //     }

    //     $input = $request->except(['_token', '_method']);
    //     $produit->update($input);

    //     return redirect('produits')->with('flash_message', 'Produit à été modifier!');
    // }

    public function update(Request $request)
    {
        $product = Produit::where('id_produit', $request->id)->first();
        Produit::where('id_produit', $request->id)->update(['qte_p' => $product->qte_p - $request->quantity]);

        return redirect('produits')->with('flash_message', 'Produit à été modifier!');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Produit::where('id_produit', $id)->delete();
        return redirect('produits')->with('lash_message', 'produits deleted!');
    }
}
