<?php

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
        $this->call(UsersTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'admin',
                'Password' => bcrypt('123456'),
                'email' => 'admin@gmail.com',
                'address' => 'So 10 - Pham Hung - Nam Tu Liem - Ha Noi',
                'phone' => '0798858822',
                'status' => 1,
            ]
        );
    }
}
