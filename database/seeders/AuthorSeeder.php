<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Author::create([
            'name' => 'Tere Liye',
            'photo' => 'tere.jpg',
            'bio' => 'Dikenal dengan karya fiksi populer yang menyentuh tema sosial, keluarga, dan petualangan.'
        ]);

        Author::create([
            'name' => 'Andrea Hirata',
            'photo' => 'andrea.jpg',
            'bio' => 'Penulis Laskar Pelangi. Karyanya sering berlatar belakang daerah Belitong dengan nuansa inspiratif dan humanis.'
        ]);

        Author::create([
            'name' => 'Dewi Lestari',
            'photo' => 'dee.jpg',
            'bio' => 'Lebih dikenal sebagai Dee Lestari. Karyanya bervariasi dari fiksi ilmiah (Supernova) hingga tema filosofis.'
        ]);

        Author::create([
            'name' => 'Pramoedya Ananta Toer',
            'photo' => 'pram.jpg',
            'bio' => 'Salah satu sastrawan terbesar Indonesia. Karyanya banyak membahas sejarah, kolonialisme, dan perjuangan bangsa.'
        ]);

        Author::create([
            'name' => 'Eka Kurniawan',
            'photo' => 'eka.jpg',
            'bio' => 'Dikenal secara internasional. Karyanya sering memadukan realisme magis, mitos, dan sejarah Indonesia.'
        ]);
    }
}
