<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Membuat akun admin FloodSense
        User::updateOrCreate(
            ['email' => 'admin@floodsense.test'],
            [
                'name' => 'Admin FloodSense',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]
        );

        // Membuat 10 data laporan dummy
        $this->call([
            ReportSeeder::class,
        ]);
    }
}
