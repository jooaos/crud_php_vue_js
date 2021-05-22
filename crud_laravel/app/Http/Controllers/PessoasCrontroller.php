<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrDeltePessoasRequest;
use App\Pessoas as Pessoas;
use Illuminate\Http\Request;

class PessoasCrontroller extends Controller
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
     * @param  App\Http\Requests\UpdateOrDeltePessoasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateOrDeltePessoasRequest $request)
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
    public function show(Pessoas $pessoas)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoas $pessoas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoas $pessoas)
    {
        //
    }
}
