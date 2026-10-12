
<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReportSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $lokasi = [
            'Dayeuhkolot, Kabupaten Bandung',
            'Baleendah, Kabupaten Bandung',
            'Bojongsoang, Kabupaten Bandung',
            'Banjaran, Kabupaten Bandung',
            'Cileunyi, Kabupaten Bandung',
            'Rancaekek, Kabupaten Bandung',
            'Majalaya, Kabupaten Bandung',
            'Ciparay, Kabupaten Bandung',
            'Katapang, Kabupaten Bandung',
            'Pameungpeuk, Kabupaten Bandung',
        ];

        foreach (range(1, 15) as $i) {
            Report::create([
                'reporter_name' => $faker->name(),
                'location' => $faker->randomElement($lokasi),
                'description' => $faker->sentence(12),
                'photo_path' => null,
                'status' => $faker->randomElement([
                    'Baru',
                    'Diproses',
                    'Selesai',
                ]),
                'tinggi_genangan' => $faker->numberBetween(10, 150),
                'tanggal_kejadian' => $faker->dateTimeBetween(
                    '-30 days',
                    'now'
                )->format('Y-m-d'),
            ]);
        }
    }
}
