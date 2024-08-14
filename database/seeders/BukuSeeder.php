<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buku')->insert([
            [
                'judul' => 'Pendidikan Karakter',
                'pengarang' => 'John Doe',
                'konten' => 'Buku ini membahas tentang pentingnya pendidikan karakter dalam kehidupan sehari-hari.',
            ],
            [
                'judul' => 'Pemrograman Laravel',
                'pengarang' => 'Jane Smith',
                'konten' => 'Panduan lengkap untuk belajar Laravel dari dasar hingga tingkat lanjut.',
            ],
            [
                'judul' => 'Sejarah Dunia',
                'pengarang' => 'Michael Johnson',
                'konten' => 'Sebuah buku yang merangkum berbagai peristiwa penting dalam sejarah dunia.',
            ],
            [
                'judul' => 'Filsafat Modern',
                'pengarang' => 'Emily Davis',
                'konten' => 'Kajian mendalam mengenai aliran-aliran filsafat yang berkembang di era modern.',
            ],
            [
                'judul' => 'Teknik Fotografi',
                'pengarang' => 'Robert Brown',
                'konten' => 'Panduan praktis untuk teknik-teknik dasar dan lanjutan dalam fotografi.',
            ],
        ]);
    }
}
