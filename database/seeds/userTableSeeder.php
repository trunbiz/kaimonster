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
                'password' => bcrypt('isu@2020'),
                'birdday' => '2020-11-11',
                'description' => 'Tài khoản Admin',
                'address' => 'Hà Nội',
                'email' => 'info.isu@gmail.com'
            ]
        ];
        DB::table('users')->insert($data);
    }
}
