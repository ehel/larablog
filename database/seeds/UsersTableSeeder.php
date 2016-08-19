<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'author1',
            'email' => 'author1@gmail.com',
            'password' => bcrypt('author1')
        ]);
        DB::table('users')->insert([
            'name' => 'author2',
            'email' => 'author2@gmail.com',
            'password' => bcrypt('author2')
        ]);
        DB::table('users')->insert([
            'name' => 'subscriber1',
            'email' => 'subscriber1@gmail.com',
            'password' => bcrypt('subscriber1'),
            'role' => 'subscriber'
        ]);
        DB::table('users')->insert([
            'name' => 'subscriber2',
            'email' => 'subscribe2@gmail.com',
            'password' => bcrypt('subscriber2'),
            'role' => 'subscriber'
        ]);
    }
}
