<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // private $authors = [
    //     [
    //         'id' => '1',
    //         'name' => 'Tere Liye',
    //         'photo' => 'tere.jpg',
    //         'bio' => 'Dikenal dengan karya fiksi populer yang menyentuh tema sosial, keluarga, dan petualangan.'
    //     ],
    //     [
    //         'id' => '2',
    //         'name' => 'Andrea Hirata',
    //         'photo' => 'andrea.jpg',
    //         'bio' => 'Penulis Laskar Pelangi. Karyanya sering berlatar belakang daerah Belitong dengan nuansa inspiratif dan humanis.'
    //     ],
    //     [
    //         'id' => '3',
    //         'name' => 'Dewi Lestari',
    //         'photo' => 'dee.jpg',
    //         'bio' => 'Lebih dikenal sebagai Dee Lestari. Karyanya bervariasi dari fiksi ilmiah (Supernova) hingga tema filosofis.'
    //     ],
    //     [
    //         'id' => '4',
    //         'name' => 'Pramoedya Ananta Toer',
    //         'photo' => 'pram.jpg',
    //         'bio' => 'Salah satu sastrawan terbesar Indonesia. Karyanya banyak membahas sejarah, kolonialisme, dan perjuangan bangsa.'
    //     ],
    //     [
    //         'id' => '5',
    //         'name' => 'Eka Kurniawan',
    //         'photo' => 'eka.jpg',
    //         'bio' => 'Dikenal secara internasional. Karyanya sering memadukan realisme magis, mitos, dan sejarah Indonesia.'
    //     ]
     
    // ];

    // public function getAuthors(){
    //     return $this->authors;
    // }

    protected $table = 'author';
}
