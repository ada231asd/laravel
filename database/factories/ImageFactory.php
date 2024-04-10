<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Создаём имя несуществующего графического файла
        // для заполнение столбца `path` в таблице `images`.

        // Метод `uuid` возвращает универсально уникальный идентификатор,
        // например `4a8d7c0a-31e2-375e-8dce-4fdb21a63172`.
        $name = $this->faker->unique()->uuid();

        // Метод `randomElement` возвращает элемент массива,
        // выбранный псевдослучайным образом. Предложим
        // ему массив расширений имён графических файлов.
        $extension = $this->faker->randomElement([
            'gif',
            'jpeg',
            'png',
            'webp',
        ]);

        // Конструируем имя файла. Должно получиться что‑то
        // вроде `4a8d7c0a-31e2-375e-8dce-4fdb21a63172.jpeg`.
        $filename = "{$name}.{$extension}";

        return [
            'path' => $filename,
        ];
    }

}
