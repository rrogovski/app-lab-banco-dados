<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaTelefone extends Model
{
    use HasFactory;
    protected $table = "pessoa_telefone";
    protected $guarded = [];
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa');
    }
}
