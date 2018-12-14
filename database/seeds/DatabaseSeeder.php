<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
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

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Super-Admin', 'display_name' => 'Super Admin'],
            ['name' => 'Administrator', 'display_name' => 'Administrator'],
            ['name' => 'Editor', 'display_name' => 'Editor'],
            ['name' => 'Author', 'display_name' => 'Author'],
            ['name' => 'Contributor', 'display_name' => 'Contributor'],
            


        ]);
    }
}

