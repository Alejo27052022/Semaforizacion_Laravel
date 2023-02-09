<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistente
 *
 * @property $cod_asistente
 * @property $cod_denuncia
 * @property $nom_asistente
 * @property $last_asistente
 * @property $cargo
 * @property $email
 * @property $pass
 * @property $created_at
 * @property $updated_at
 *
 * @property Denuncium $denuncium
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asistente extends Model
{

    static $rules = [
		'cod_caso' => 'required',
		'nom_asistente' => 'required',
		'last_asistente' => 'required',
		'cargo' => 'required',
		'email' => 'required',
		'pass' => 'required',
    ];

    protected $primaryKey = 'cod_asistente';

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cod_asistente','cod_caso','nom_asistente','last_asistente','cargo','email','pass'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function denuncium()
    {
        return $this->hasMany('App\Models\Denuncium', 'casos_id', 'cod_caso');
    }


}
