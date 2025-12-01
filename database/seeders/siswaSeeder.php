<?php

namespace Database\Seeders;

use App\Models\siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Database\Factories\siswaFactory;

class siswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        siswa::factory(30)->create();
    }
}
