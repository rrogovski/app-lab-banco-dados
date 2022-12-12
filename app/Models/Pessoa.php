<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = "pessoa";
    protected $guarded = [];
    public function sexo()
    {
        return $this->hasOne(Sexo::class, 'codigo');
    }
    public function telefones()
    {
        return $this->hasMany(PessoaTelefone::class, 'pessoa');
    }
}
