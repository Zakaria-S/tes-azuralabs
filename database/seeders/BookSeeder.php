<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Sapiens - Riwayat Singkat Umat Manusia',
                'author' => 'Yuval Noah Harari',
                'publisher' => 'Kepustakaan Populer Gramedia',
                'publication_date' => '2017-09-10',
                'pages_number' => 527,
                'category_id' => Category::where('category_name', 'Anthropology')->first()->id
            ],
            [
                'title' => 'Sebuah Seni untuk Bersikap Bodo Amat',
                'author' => 'Mark Manson',
                'publisher' => 'Gramedia Widiasarana Indonesia',
                'publication_date' => '2016-09-13',
                'pages_number' => 246,
                'category_id' => Category::where('category_name', 'Non-Fiction')->first()->id
            ],
            [
                'title' => 'Il Principe - Sang Penguasa',
                'author' => 'Niccolo Machiavelli',
                'publisher' => 'Narasi',
                'publication_date' => '2022-01-22',
                'pages_number' => 184,
                'category_id' => Category::where('category_name', 'Philosophy')->first()->id
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }

        $images = [
            [
                'book_id' => Book::where('title', 'like', 'Sapiens - Riwayat Singkat Umat Manusia')->first()->id,
                'name' => 'Ysn7ZpeiITHJ0acVzwEaVNBUWPpIPvw0rGV3lbdQ.jpg'
            ],
            [
                'book_id' => Book::where('title', 'like', 'Sebuah Seni untuk Bersikap Bodo Amat')->first()->id,
                'name' => 'FNvCAzkrDtqW83l3dqubb4a8WMvouDQzFLUOPKdS.png'
            ],
            [
                'book_id' => Book::where('title', 'like', 'Il Principe - Sang Penguasa')->first()->id,
                'name' => '5EQdJZkGWArlqsX9JXunskuFnrozlb1rYQkCW2lt.jpg'
            ],
        ];

        foreach ($images as $image) {
            Image::create($image);
        }
    }
}
