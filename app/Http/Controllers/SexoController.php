<?php

namespace App\Http\Controllers;

use App\Http\Requests\SexoRequest;
use App\Models\Sexo;
use Illuminate\Http\Request;

class SexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sexo = Sexo::orderBy('codigo','ASC')->get();
        return response()->json($data = $sexo);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SexoRequest $request)
    {
        $request->validated();
        Sexo::create($request->all());
        return response()->json([
            'status' => true,
            'messege' => 'Registro adicionado com sucesso!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $codigo
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $codigo
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $sexo = Sexo::find($codigo);
        return response()->json($data = $sexo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $codigo
     * @return \Illuminate\Http\Response
     */
    public function update(SexoRequest $request, $codigo)
    {
        $request->validated();
        Sexo::where('codigo', $codigo)->update($request->all());
        return response()->json([
            'status' => true,
            'messege' => 'Registro atualizado com sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $codigo
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigo)
    {
        Sexo::destroy($codigo);
        return response()->json(['data' => 'sucesso']);
    }
}
