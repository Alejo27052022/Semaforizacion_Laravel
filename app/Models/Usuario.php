<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @property $codigo
 * @property $ced_user
 * @property $nom_user
 * @property $last_user
 * @property $direc
 * @property $telefono
 * @property $email
 * @property $pass
 * @property $created_at
 * @property $updated_at
 *
 * @property Denuncium[] $denuncias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    
    static $rules = [
		'codigo' => 'required',
		'ced_user' => 'required',
		'nom_user' => 'required',
		'last_user' => 'required',
		'direc' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'pass' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','ced_user','nom_user','last_user','direc','telefono','email','pass'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function denuncias()
    {
        return $this->hasMany('App\Models\Denuncium', 'codigo_user', 'codigo');
    }
    

}
