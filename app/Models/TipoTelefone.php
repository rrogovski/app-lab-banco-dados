<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTelefone extends Model
{
    use HasFactory;
    protected $table = "tipo_telefone";
    protected $guarded = [];
}
