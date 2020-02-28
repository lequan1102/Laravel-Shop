<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GenderTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('Gender')->insert(
            [
                'gender' => 'man',
                'user_id' => '1'
            ],
            [
                'gender' => 'women',
                'user_id' => '2'
            ],
            [
                'gender' => 'other',
                'user_id' => '3'
            ]
        );
    }
}
