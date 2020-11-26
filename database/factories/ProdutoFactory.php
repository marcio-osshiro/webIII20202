<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produto;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'descricao' => $this->faker->name(),
          'codigo_barra' => $this->faker->ean13(),
          'valor_unitario' => $this->faker->numberBetween(1, 50),
            //
        ];
    }
}
