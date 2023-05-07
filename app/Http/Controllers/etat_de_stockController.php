<?php

namespace App\Http\Controllers;

use App\Models\Produit;

class etat_de_stockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produits = Produit::all();
        return view('layout.etatStock.etatDeStock')->with('produits', $produits);; 
    }
}
