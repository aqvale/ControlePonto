<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    public $timestamps = true;

    protected $table = 'usuarios';

    protected $fillable = [
        'name', 'cpf', 'password', 'dia_id', 'status', 'permission',
    ];

    protected $hidden = [
        'password',
    ];


}