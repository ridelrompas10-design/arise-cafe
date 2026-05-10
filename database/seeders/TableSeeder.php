<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table;

class TableSeeder extends Seeder
{
    public function run(): void
    {
        Table::create([
            'name' => 'A1',
            'capacity' => 2
        ]);

        Table::create([
            'name' => 'A2',
            'capacity' => 4
        ]);

        Table::create([
            'name' => 'B1',
            'capacity' => 6
        ]);

        Table::create([
            'name' => 'VIP 1',
            'capacity' => 8
        ]);
    }
}