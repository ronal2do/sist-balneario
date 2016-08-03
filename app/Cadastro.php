<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
   protected $fillable = [
   		'nome',
   		'segmento',
   		'contato_interno',
   		'grau_apoio',
   		'area_atuacao',
   		'lng',
         'lat',
   		'tipo',
   		'logradouro',
   		'bairro',
   		'numero',
   		'telefone',
   		'email',
         'facebook',
         'sexo',
         'nascimento',
   		'tiporesidencia'
   ];
}
