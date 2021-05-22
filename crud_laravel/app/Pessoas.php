<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{
    protected $table = 'pessoas';
    protected $fillable = ['nome_usuario', 'email_usuario', 'fk_categoria_id'];
    protected $primaryKey = 'codigo';
    public $timestamps = false;
}
