<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    protected $fillable = [
      'matricula',
      'nombre',
      'app',
      'gen',
      'fn',
      'email',
      'password',
      'activo',
    ];

    protected $hidden = [
      'password',
  ];
}
