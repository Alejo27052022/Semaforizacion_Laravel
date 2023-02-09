<?php

namespace App\Models;

use App\Rules\CedulaEcuador;
use Illuminate\Database\Eloquent\Model;



/**
 * Class Denuncium
 *
 * @property $cod_denuncia
 * @property $ced_denunciante
 * @property $casos_id
 * @property $codigo_user
 * @property $victima
 * @property $victimario
 * @property $email_contacto
 * @property $num_contacto
 * @property $estatus
 * @property $created_at
 * @property $updated_at
 *
 * @property Asistente[] $asistentes
 * @property Caso $caso
 * @property Usuario $usuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Denuncium extends Model
{

    public static $rules = [
        'ced_denunciante' => ['nullable', 'min:10' , 'max:10'],
		'casos_id' => 'required',
        'rol' => 'required',
		'victima' => 'required',
		'victimario' => 'required',
		'email_contacto' => ['nullable', 'email'],
		'num_contacto' => ['required', 'integer'],
        'direccion' => '',
        'latitud' => '',
        'longitud' => '',
    ];


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cod_denuncia','ced_denunciante','casos_id','rol','codigo_user','victima','victimario','email_contacto','num_contacto','direccion', 'latitud', 'longitud','estatus', ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asistentes()
    {
        return $this->hasMany('App\Models\Asistente', 'cod_denuncia', 'cod_denuncia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function caso()
    {
        return $this->hasOne('App\Models\Caso', 'id', 'casos_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Models\Usuario', 'codigo', 'codigo_user');
    }


}
