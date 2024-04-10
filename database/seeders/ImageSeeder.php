<?php

namespace Database\Seeders;
use App\Models\Image;
use App\Models\Sparepart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Sparepart::all();
        Image::factory()
            ->count(1)
            ->for(
                $products->isEmpty() ? Sparepart::factory() : $products->random()
            )
            ->create();

    }
}
