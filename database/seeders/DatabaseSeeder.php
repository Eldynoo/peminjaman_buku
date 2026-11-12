<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::create(['name'=>'eldyno', 'email'=>'admin@gmail.com', 'password'=>'123', 'role'=>'admin']);
       User::create(['name'=>'eldyno', 'email'=>'siswa@gmail.com', 'password'=>'123', 'role'=>'siswa', 'kelas'=>'XII FRONTEND']);

       Book::create(['title'=>'one piece', 'author'=>'ichiri oda', 'publisher'=>'manga', 'year'=>1997, 'stok'=>10 ]);
       Book::create(['title'=>'one piece', 'author'=>'ichiri oda', 'publisher'=>'manga', 'year'=>1997, 'stok'=>10 ]);
       Book::create(['title'=>'one piece', 'author'=>'ichiri oda', 'publisher'=>'manga', 'year'=>1997, 'stok'=>10 ]);
    }
}
