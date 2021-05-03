<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'username' => 'admin',
                'fullname' => 'admin',
                'password' => bcrypt('Trunbiz@98'),
                'birthday' => '2020-11-11',
                'description' => 'Tài khoản Admin',
                'address' => 'Hà Nội',
                'group_id' => 1,
                'email' => 'info.isu@gmail.com'
            ]
        ];
        DB::table('users')->insert($data);
    }
}
