<?php

namespace App\Http\Controllers;

use App\Models\Garagem;
use App\Models\MotoqueiroNoCampo;
use Illuminate\Http\Request;

class GaragemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $MCampo = MotoqueiroNoCampo::where('created_at',today())->get();
        
       return view('Agente.Garagem.index',['MCampos' =>$MCampo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Garagem $garagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Garagem $garagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Garagem $garagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garagem $garagem)
    {
        //
    }
}
