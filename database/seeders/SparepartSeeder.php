<?php

namespace Database\Seeders;
use App\Models\Image;
use App\Models\Sparepart;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::all();
        Sparepart::factory()
            ->count(1)
            ->has(Image::factory()->count(3))
            ->hasAttached(
                $tags->isEmpty() ?
                    Tag::factory()->count(3)
                    :
                    $tags->random(1, $tags->count())
            )
            ->create();

    }
}
