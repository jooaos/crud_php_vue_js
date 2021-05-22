<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoasRequest;
use App\Pessoas as Pessoas;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pessoas::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PessoasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoasRequest $request)
    {
        Pessoas::create($request->all());
        return response()->json('O usuário foi cadastrado com sucesso!', 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoas $pessoa)
    {
        return response()->json($pessoa, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoas $pessoas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PessoasRequest  $request
     * @param  \App\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function update(PessoasRequest $request, Pessoas $pessoas)
    {
        $pessoas->update($request->all());
        return response()->json('O usuário foi atualizado com sucesso!', 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoas $pessoas)
    {
        $pessoas->delete();
        return response()->json('O usuário foi deletado com sucesso!', 200);
    }
}
