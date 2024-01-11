<?php

namespace Database\Seeders;

use App\Models\orang;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        orang::create([

            'nama' => "Budi",
            'jenis_kelamin' => "laki-laki",
            'parent' => NULL
        ]);

        orang::create([

            'nama' => "Dedi",
            'jenis_kelamin' => "laki-laki",
            'parent' => 1
        ]);

        orang::create([

            'nama' => "Dodi",
            'jenis_kelamin' => "laki-laki",
            'parent' => 1
        ]);

        orang::create([

            'nama' => "Dede",
            'jenis_kelamin' => "laki-laki",
            'parent' => 1
        ]);

        orang::create([

            'nama' => "Dewi",
            'jenis_kelamin' => "perempuan",
            'parent' => 1
        ]);

        //anak dedi
        orang::create([

            'nama' => "Feri",
            'jenis_kelamin' => "laki-laki",
            'parent' => 2
        ]);

        orang::create([

            'nama' => "Farah",
            'jenis_kelamin' => "perempuan",
            'parent' => 2
        ]);

        orang::create([

            'nama' => "Gugus",
            'jenis_kelamin' => "laki-laki",
            'parent' => 3
        ]);

        orang::create([

            'nama' => "Gandi",
            'jenis_kelamin' => "laki-laki",
            'parent' => 3
        ]);

        orang::create([

            'nama' => "Hani",
            'jenis_kelamin' => "laki-laki",
            'parent' => 4
        ]);
        orang::create([

            'nama' => "Hana",
            'jenis_kelamin' => "laki-laki",
            'parent' => 4
        ]);
    }
}
