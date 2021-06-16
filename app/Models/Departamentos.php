<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    use HasFactory;
    protected $table = 'departamentos';
    protected $primaryKey = "clave";

    protected $fillable = [
        'descripcion',
        'area',
        'estatus',
    ];

    public function area()
    {
         return $this->belongsTo(Areas::class,'clave');
         //return $this->belongsTo('App\Models\Areas');
    }
}
