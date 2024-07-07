<?php

namespace Database\Seeders;

use App\Models\Ms_customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ms_customer::factory(10)->create();
    }
}
