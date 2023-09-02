<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Gere uma URL de imagem falsa com Faker
        $imageUrl = $this->faker->imageUrl(640, 480, 'produtos', true);

        // Use file_get_contents para obter o conteúdo da imagem da URL
        $imagem = file_get_contents($imageUrl);

        return [
            'nome' => $this->faker->word,
            'descricao' => $this->faker->paragraph,
            'preco' => $this->faker->randomFloat(2, 10, 9999),
            'imagem' => $imagem,
            'categoria_id' => $this->faker->randomElement([1,2,3,4,5])
        ];
    }
}
