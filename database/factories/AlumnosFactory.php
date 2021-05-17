<?php

namespace Database\Factories;

use App\Models\Alumnos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlumnosFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Alumnos::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  { 
    $man_or_woman = $this->faker->randomElement(['Hombre','Mujer']);
    return [
      'matricula' => $this->faker->numberBetween(2110000, 2210000),
      'nombre' => $this->faker->firstName($man_or_woman=='Hombre' ? 'male' : 'female'),
      'app' => $this->faker->lastName(),
      'gen' => $man_or_woman=='Hombre' ? 'Masculino' : 'Femenino',
      'fn' => $this->faker->date('Y-m-d', 'now'),
      'email' => $this->faker->unique()->safeEmail(),
      /**
       * el # es un numero aleatorio 
       * el ? es para un caracter aleatorio
       * ejemplo $this->faker->bothify(utvt##????) RESULTADO -> utvt23njie;
       */
      'password' => bcrypt('password'),
    ];
  }

  /**
   * Indicate that the model's email address should be unverified.
   *
   * @return \Illuminate\Database\Eloquent\Factories\Factory
   */
  public function unverified()
  {
    return $this->state(function (array $attributes) {
      return [
        'email_verified_at' => null,
      ];
    });
  }
}
