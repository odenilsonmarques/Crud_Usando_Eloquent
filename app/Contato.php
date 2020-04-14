<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    //informando para eloquent que minha chave primara é deferente de id
    protected $primaryKey = 'id_contatos';

    //informando para o eloquent para ignorar o campo abaixo, pq na tabela não vai ter o created_at e update_at
    public $timestamps = false;

    protected $fillable = ['nome','email','telefone'];
}
