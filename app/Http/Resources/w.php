<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SparepartCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'spareparts',

            // Используем первичный ключ как идентификатор объекта.
            // Приведём к строковому типу данных, чтобы клиент его не исказил.
            'id' => (string) $this->id,

            'attributes' => [
                // Оставляем наименование продукта без изменений.
                'title' => $this->title,

                // Приводим цену к типу действительных чисел.
                'price' => (float) $this->price,

                // Оставляем описание продукта без изменений.
                'description' => $this->description,

                // Приводим остаток продукта на складе к целочисленному типу.
                'quantity' => (int) $this->quantity,

                // Приводим флаг доступности к бу́леву типу.
                // Снятые с продажи товары можно отсеивать при выборке из БД.
                'available' => (bool) $this->available,

                // Посмотрим, как можно переименовать свойства, приводя их
                // имена к нижнему верблюжьему регистру (lowerCamelCase).
                // Однако вряд ли свойства created_at и updated_at нужны в API.
                // 'createdAt' => $this->created_at,
                // 'updatedAt' => $this->updated_at,

                // Добавляем цену в долларах США.
                // Обменный курс можно получить на сайте Центробанка России.
                'priceInUSD' => round(4999.99 / 92.7463, 2),
            ],
            'links' => [
                'self' => route('spareparts.show', ['sparepart' => $this->id]),
            ],
        ];

    }
}
