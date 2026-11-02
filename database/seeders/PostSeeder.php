<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            ['title' => 'Belajar Laravel',
            'content' => 'Belajar dasar Framework Laravel.',
            'author' => 'amisha',
            ],
            ['title' => 'Mengenal Eloquent',
            'content' => 'Belajar menggunakan ELOQUENT',
            'author' => 'amisha',
            ],
            ['title' => 'Memahami MVC',
            'content' => 'Memahami Model View Controller.',
            'author' => 'amisha',
            ],
        ]);
    }
}
