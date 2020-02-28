<?php

use Illuminate\Database\Seeder;
use Modules\Backend\Entities\Posts;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Posts::class, 100)->create();
        // DB::table('posts')->delete();
        // DB::table('posts')->create([
        //     [
        //         'id'        => 1,
        //         'title'     => 'HƯỚNG DẪN CÀI LẠI WORDPRESS KHI BỊ DÍNH MÃ ĐỘC',
        //         'excerpt'   => 'miêu tả nội dung ngắn ngọn',
        //         'body'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        //         'author_id' => 1,
        //     ]
        // ]);
    }
}
