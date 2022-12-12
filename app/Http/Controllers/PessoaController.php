<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaRequest;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoa = Pessoa::with('sexo')->orderby('nome','ASC')->get();
        return response()->json($pessoa);
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
    public function store(PessoaRequest $request)
    {
    $request->validated();
    $pessoaCreated = Pessoa::create($request->all());
    return response()->json([
        'status' => true,
        'messege' => 'Registro adicionado com sucesso!',
        'pessoa' => $pessoaCreated
    ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pessoa = Pessoa::where('id',$id)->with('sexo')->first();
        return response()->json($pessoa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaRequest $request, $id)
    {
        $request->validated();
        Pessoa::where('id', $id)->update($request->all());
        return response()->json([
            'status' => true,
            'messege' => 'Registro atualizado com sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pessoa::destroy($id);
        return response()->json('sucesso');
    }
}
