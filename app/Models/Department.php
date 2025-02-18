<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tamaño',
        'precio',
        'estatus',
        'description',
        'fecha_agregado',
        'pisos',
        'id_administrador',
    ];

    public function createdBy(){
        return $this->belongsTo(User::class, 'id_administrador');
    }
}
