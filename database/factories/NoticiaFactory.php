<?php

namespace Database\Factories;

use App\Models\Noticia;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'titulo' => $this->faker->realText(50, 1),
          'descricao' => $this->faker->realText,
          'data' => $this->faker->date,
          'cidade' => $this->faker->city,
          'categoria_id' => Categoria::orderbyRaw('RANDOM()')->take(1)->first()->id,
          'imagem' => $this->faker->image('/home/usuario/Área de trabalho/2020.2/webIII/laravel/webIII20202/public/imagens/', 640, 480, 'cats', false),
        ];
    }
}
