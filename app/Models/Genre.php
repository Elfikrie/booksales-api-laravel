<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    // private $genres = [
    //     [
    //         'id' => '1',
    //         'name' => 'Biografi',
    //         'description' => 'Kisah nyata tentang kehidupan seseorang yang berpengaruh atau terkenal.'
    //     ],
    //     [
    //         'id' => '2',
    //         'name' => 'Fiksi Ilmiah (Sci-Fi)',
    //         'description' => 'Genre yang membahas ide-ide spekulatif dan futuristik, sering melibatkan teknologi canggih atau luar angkasa.'
    //     ],
    //     [
    //         'id' => '3',
    //         'name' => 'Romansa',
    //         'description' => 'Fokus utama cerita adalah pada hubungan emosional yang intens dan romantis antara karakter utama.'
    //     ],
    //     [
    //         'id' => '4',
    //         'name' => 'Thriller',
    //         'description' => 'Genre yang ditandai dengan ketegangan tinggi, kegembiraan, dan elemen misteri yang membuat pembaca terus bertanya-tanya.'
    //     ],
    //     [
    //         'id' => '5',
    //         'name' => 'Pengembangan Diri (Self-Help)',
    //         'description' => 'Buku non-fiksi yang bertujuan memberikan saran, instruksi, atau tips untuk peningkatan diri dan kesejahteraan.'
    //     ]
    // ];

    // public function getGenres(){
    //     return $this->genres;
    // }
    protected $table = 'genres';
}
