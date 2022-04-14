<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividadejf extends Model
{
    use HasFactory;

    public const SIMPATIA_RADIO = [
        '0'  => '0',
        '1'  => '1',
        '2'  => '2',
        '3'  => '3',
        '4'  => '4',
        '5'  => '5',
        '6'  => '6',
        '7'  => '7',
        '8'  => '8',
        '9'  => '9',
        '10' => '10',
    ];

    public const ATIVIDADE_RADIO = [
        '0'  => '0',
        '1'  => '1',
        '2'  => '2',
        '3'  => '3',
        '4'  => '4',
        '5'  => '5',
        '6'  => '6',
        '7'  => '7',
        '8'  => '8',
        '9'  => '9',
        '10' => '10',
    ];

    public $table = 'actividadejfs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'jf_id',
        'grupo_id',
        'equipa_id',
        'atividade',
        'simpatia',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jf()
    {
        return $this->belongsTo(JuntasFreguesium::class, 'jf_id');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    public function equipa()
    {
        return $this->belongsTo(Equipa::class, 'equipa_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
