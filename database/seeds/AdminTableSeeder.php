<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin')->delete();
        DB::table('admin')->insert([
            [
                'id'                => '1',
                'name'              => 'Boss',
                'email'             => 'boss@gmail.com',
                'password'          => bcrypt('Fondkjjk'),
                'remember_token'    => Str::random(10),
                'status'            => '1',
                'avatar'            => '/public/uploads/images/2.jpg',
                'background'        => '/public/uploads/images/admin.jpg',
                'created_at'        => new DateTime,
            ],
            [
                'id'                => '2',
                'name'              => 'Administration',
                'email'             => 'admin@gmail.com',
                'password'          => bcrypt('password'),
                'remember_token'    => Str::random(10),
                'status'            => '1',
                'avatar'            => '/public/uploads/images/2.jpg',
                'background'        => '/public/uploads/images/admin.jpg',
                'created_at'        => new DateTime,
            ],
            [
                'id'                => '3',
                'name'              => 'Editor',
                'email'             => 'editor@gmail.com',
                'password'          => bcrypt('password'),
                'remember_token'    => Str::random(10),
                'status'            => '1',
                'avatar'            => '/public/uploads/images/2.jpg',
                'background'        => '/public/uploads/images/admin.jpg',
                'created_at'        => new DateTime,
            ],
            [
                'id'                => '4',
                'name'              => 'Author',
                'email'             => 'author@gmail.com',
                'password'          => bcrypt('password'),
                'remember_token'    => Str::random(10),
                'status'            => '1',
                'avatar'            => '/public/uploads/images/2.jpg',
                'background'        => '/public/uploads/images/admin.jpg',
                'created_at'        => new DateTime,
            ]
        ]);
    }
}
