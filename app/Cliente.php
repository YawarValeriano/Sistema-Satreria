<?php

namespace SastRicAtelier;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';
    protected $primaryKey='CI';

    public $timestamps=false;
    
    protected $fillable = [
        'CI',
        'nombre', 
        'apellidos', 
        'telefono', 
        'zona'
    ];

    protected $guarded =[

    ];

}
