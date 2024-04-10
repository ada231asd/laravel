<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sparepart>
 */
class SparepartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Метод `word` возвращает 1 слово.
            // Метод `unique` гарантирует, что слово не будет повторяться.
            'name' => $this->faker->unique()->word(),

            // Число из промежутка [0.01; 999.99]; 2 разряда в дробной части.
            'price' => $this->faker->randomFloat(2, 0.01, 999.99),

            // Текст длиной до 15 знаков.
            'description' => $this->faker->text(15),

            // Число из промежутка [1; 127].
            'quantity' => $this->faker->numberBetween(1, 127),

            // Значение задано явно.
            'available' => true,
        ];

    }
}
