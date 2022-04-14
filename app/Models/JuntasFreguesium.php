<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuntasFreguesium extends Model
{
    use HasFactory;

    public $table = 'juntas_freguesia';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'localidade',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jfActividadejfs()
    {
        return $this->hasMany(Actividadejf::class, 'jf_id', 'id');
    }

    public function jfAtividadeparticipantes()
    {
        return $this->hasMany(Atividadeparticipante::class, 'jf_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
