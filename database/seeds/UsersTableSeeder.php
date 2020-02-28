<?php

use Illuminate\Database\Seeder;
use Modules\Backend\Entities\Users;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        factory(Users::class, 100)->create();
        
    //   DB::table('customer')->delete();
    //   DB::table('customer')->insert([
    //       [
    //           'id'        => '1',
    //           'name'      => 'Nguyễn Thị Thịnh',
    //           'email'     => 'thinhnguyen@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '2',
    //           'name'      => 'Nguyễn Mai Anh',
    //           'email'     => 'maianh@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '3',
    //           'name'      => 'Nguyễn Thị Diệu Ái',
    //           'email'     => 'dieuai@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '4',
    //           'name'      => 'Vũ Thị Minh Duyên',
    //           'email'     => 'minhduyen@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '5',
    //           'name'      => 'Lê Ân Thiện',
    //           'email'     => 'anthien@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '6',
    //           'name'      => 'Lê Bá Tùng',
    //           'email'     => 'batung@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '7',
    //           'name'      => 'Nguyễn Bá Lộc',
    //           'email'     => 'baloc@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '8',
    //           'name'      => 'Vũ Tuệ Nhi',
    //           'email'     => 'tuenhi@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '9',
    //           'name'      => 'Hồ Dạ Nguyệt',
    //           'email'     => 'danguyet@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '10',
    //           'name'      => 'Hồ Minh Ngọc',
    //           'email'     => 'minhngoc@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '11',
    //           'name'      => 'Nguyễn Thị Gia Nhi',
    //           'email'     => 'gianhinguyen@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '12',
    //           'name'      => 'Bùi Văn Trọng',
    //           'email'     => 'vantrong@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '13',
    //           'name'      => 'Trần Hoài Nam',
    //           'email'     => 'hoainam@gmail.com',
    //           'password'  => bcrypt('password')
    //       ],
    //       [
    //           'id'        => '14',
    //           'name'      => 'Trần Văn Sơn',
    //           'email'     => 'vanson@gmail.com',
    //           'password'  => bcrypt('password')
    //       ]
    //   ]);
    }
}
