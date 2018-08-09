<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Dia extends Model
{
    use SoftDeletes;
    use Notifiable;

    public $timestamps = true;

    protected $table = 'dias';

    protected $fillable = [
        'data', 'horaEntrada', 'horaSaiAlmoco', 'horaVoltaAlmoco', 'horaSaida', 'SaidaRapida', 'horaSaidaRapida', 'horaChegadaRapida',
    ];

    protected $hidden = [];
}