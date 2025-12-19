<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;


class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Service::create([
        'name' => 'Cuci Kering',
        'price_per_kg' => 7000
    ]);

    Service::create([
        'name' => 'Cuci Setrika',
        'price_per_kg' => 9000
    ]);
}
}
