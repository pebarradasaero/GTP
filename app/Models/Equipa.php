<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipa extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'equipas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'grupo_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function equipaActividadejfs()
    {
        return $this->hasMany(Actividadejf::class, 'equipa_id', 'id');
    }

    public function equipaAtividadeparticipantes()
    {
        return $this->hasMany(Atividadeparticipante::class, 'equipa_id', 'id');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
