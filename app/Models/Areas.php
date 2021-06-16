<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $primaryKey = "clave";
    protected $fillable = [
        'descripcion',
        'estatus'
        
    ];
    public function departamentos()
    {
        //return $this->hasMany(Departamentos::class);
        return $this->hasOne(Departamentos::class,'area');
    }
}
