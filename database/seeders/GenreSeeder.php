<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Genre::create([
            'name' => 'Biografi',
            'description' => 'Kisah nyata tentang kehidupan seseorang yang berpengaruh atau terkenal.'
        ]);

         Genre::create([
            'name' => 'Fiksi Ilmiah (Sci-Fi)',
            'description' => 'Genre yang membahas ide-ide spekulatif dan futuristik, sering melibatkan teknologi canggih atau luar angkasa.'
        ]);

         Genre::create([
            'name' => 'Romansa',
            'description' => 'Fokus utama cerita adalah pada hubungan emosional yang intens dan romantis antara karakter utama.'
        ]);

         Genre::create([
            'name' => 'Thriller',
            'description' => 'Genre yang ditandai dengan ketegangan tinggi, kegembiraan, dan elemen misteri yang membuat pembaca terus bertanya-tanya.'
        ]);

         Genre::create([
            'name' => 'Pengembangan Diri (Self-Help)',
            'description' => 'Buku non-fiksi yang bertujuan memberikan saran, instruksi, atau tips untuk peningkatan diri dan kesejahteraan.'
        ]);
    }
}
