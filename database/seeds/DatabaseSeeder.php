<?php

use App\User;
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
        // $this->call(UsersTableSeeder::class);
        User::create(array(
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'name' => 'Trang Le Nguyen'
        ));
    }
}
