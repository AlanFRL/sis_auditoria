<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    use HasFactory;
    protected $fillable = [
        'idBioquimico',
    ];
    protected $table = 'analisis';

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'idOrden');
    }
    public function bioquimico()
    {
        return $this->belongsTo(Bioquimico::class, 'idBioquimico');
    }
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'idPaciente');
    }

}
