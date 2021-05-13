<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumnos;

class AlumnosTableSeeder extends Seeder{
  public function run(){
    Alumnos::factory(100)->create();
  }
}