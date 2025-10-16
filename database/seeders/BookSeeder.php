<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Book::create([
            'title' => "Janji",
            'description' => 'Hidup adalah pengembaraan dan akhir dari segalanya ialah kematian',
            'price' => 110000,
            'stock' => 50,
            'cover_photo' => 'janji.jpg',
            'genre_id' => 2,
            'author_id' => 1
        ]);

        Book::create([
            'title' => "Bumi Manusia",
            'description' => 'Kisah perjuangan Minke melawan ketidakadilan kolonial dan pencarian jati diri.',
            'price' => 125000,
            'stock' => 30,
            'cover_photo' => 'bumi_manusia.jpg',
            'genre_id' => 1, // Anggap genre 1 adalah Fiksi
            'author_id' => 2
        ]);

        Book::create([
            'title' => "Filosofi Teras",
            'description' => 'Panduan praktis untuk mengatasi emosi negatif dan menjalani hidup yang bahagia berdasarkan filsafat Stoic.',
            'price' => 85000,
            'stock' => 75,
            'cover_photo' => 'filosofi_teras.jpg',
            'genre_id' => 5, // Anggap genre 5 adalah Pengembangan Diri
            'author_id' => 3
        ]);

        Book::create([
            'title' => "The Da Vinci Code",
            'description' => 'Robert Langdon memecahkan misteri sejarah dan seni yang mengancam kekristenan.',
            'price' => 99000,
            'stock' => 45,
            'cover_photo' => 'da_vinci_code.jpg',
            'genre_id' => 4, // Anggap genre 4 adalah Thriller/Misteri
            'author_id' => 4
        ]);

        Book::create([
            'title' => "Dilan: Dia adalah Dilanku Tahun 1990",
            'description' => 'Kisah cinta romantis remaja SMA di Bandung pada tahun 90-an.',
            'price' => 75000,
            'stock' => 60,
            'cover_photo' => 'dilan_1990.jpg',
            'genre_id' => 3, // Anggap genre 3 adalah Romansa
            'author_id' => 5
        ]);
    }
}
