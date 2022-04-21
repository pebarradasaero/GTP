<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'grupos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function grupoActividadejfs()
    {
        return $this->hasMany(Actividadejf::class, 'grupo_id', 'id');
    }

    public function grupoEquipas()
    {
        return $this->hasMany(Equipa::class, 'grupo_id', 'id');
    }

    public function grupoAtividadeparticipantes()
    {
        return $this->hasMany(Atividadeparticipante::class, 'grupo_id', 'id');
    }

    public function grupoRegistoRegularidades()
    {
        return $this->hasMany(RegistoRegularidade::class, 'grupo_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
