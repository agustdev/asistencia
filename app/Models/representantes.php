<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class representantes extends Model
{
    use HasFactory;
    protected $fillable = ['id_institucion', 'nombre_completo', 'id_invitado'];
}
