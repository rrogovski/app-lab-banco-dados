<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoTelefoneRequest;
use App\Models\TipoTelefone;
use Illuminate\Http\Request;

class TipoTelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoTelefone = TipoTelefone::orderBy('codigo','ASC')->get();
        return response()->json($data = $tipoTelefone);
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
}
