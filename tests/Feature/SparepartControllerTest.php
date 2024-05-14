<?php

namespace Tests\Feature;

use App\Models\Sparepart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SparepartControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testIndex(): void
    {
        // Подаём запрос на сервер.
        $response = $this->get(route('spareparts.index'));

        // Проверяем статус ответа сервера.
        $response->assertStatus(200);
    }

    public function testStore(): void
    {
        // Вызываем фабрику и преобразуем объект в массив.
        $data = Sparepart::factory()->make([
            // Здесь можно заменить значения полей, созданные фабрикой.
            // 'name' => 'Новое наименование товара',
            // 'price' => 100.99,
        ])->toArray();

        // Подаём запрос, передавая массив как тело сообщения.
        $response = $this->post(route('spareparts.store'), $data);

        // Проверяем статус ответа сервера.
        $response->assertStatus(201);
    }

    public function testShow()
    {
        // Выбираем случайную запись из БД.
        $sparepart = Sparepart::all()->random(1)->firstOrFail();

        // Подаём запрос, используя значение первичного ключа.
        $response = $this->get(route('spareparts.show', [
            'sparepart' => $sparepart->id,
        ]));

        // Проверяем статус ответа сервера.
        $response->assertStatus(200);
    }

}
