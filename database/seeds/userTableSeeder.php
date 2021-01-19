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
                'password' => bcrypt('123456'),
                'birthday' => '2020-11-11',
                'description' => 'Tài khoản Admin',
                'address' => 'Hà Nội',
                'email' => 'info.isu@gmail.com'
            ]
        ];
        DB::table('users')->insert($data);
    }
}
