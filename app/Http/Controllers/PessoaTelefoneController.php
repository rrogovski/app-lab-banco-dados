<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaTelefoneRequest;
use App\Models\PessoaTelefone;
use Illuminate\Http\Request;

class PessoaTelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoaTelefone = PessoaTelfone::orderby('tipo','ASC')->get();
        return response()->json($pessoaTelefone);
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
    public function store(PessoaTelefoneRequest $request)
    {
    $request->validated();
    $pessoaTelefoneCreated = PessoaTelefone::create($request->all());
    return response()->json([
        'status' => true,
        'messege' => 'Registro adicionado com sucesso!',
        'pessoaTelefone' => $pessoaTelefoneCreated
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

        $pessoaTelefone = PessoaTelfone::where('id',$id)->with('sexo')->first();
        return response()->json($pessoaTelefone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaTelefoneRequest $request, $id)
    {
        $request->validated();
        $pessoaTelefoneUpdated = PessoaTelefone::where('id', $id)->update($request->all());
        return response()->json([
            'status' => true,
            'messege' => 'Registro atualizado com sucesso!',
            'pessoaTelefone' => $pessoaTelefoneUpdated
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PessoaTelefone::destroy($id);
        return response()->json('sucesso');
    }
}
