<?php

namespace FederalSt\Veiculos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class CadastroVeiculo extends Model
{
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cadastro_veiculos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'placa',
        'renavam',
        'modelo',
        'marca',
        'ano',
        'proprietario',
    ];

    public $rules = [
        'placa' => 'required|string|unique:cadastro_veiculos,placa',
        'renavam' => 'required|numeric',
        'modelo' => 'required|string',
        'marca' => 'required|string',
        'ano' => 'required|numeric',
        'proprietario' => 'required|string|exists:users,cpf',
    ];
    
}
