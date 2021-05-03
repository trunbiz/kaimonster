<?php

use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
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
                'id' => 1,
                'code' => 'admin',
                'name' => 'Admin'
            ],
            [
                'id' => 2,
                'code' => 'engineer_technology',
                'name' => 'Kỹ Sư công nghệ'
            ],
            [
                'id' => 3,
                'code' => 'editor',
                'name' => 'Biên tập viên'
            ],
            [
                'id' => 4,
                'code' => 'administrators',
                'name' => 'Quản trị viên'
            ],
            [
                'id' => 5,
                'code' => 'guest',
                'name' => 'Người dùng'
            ]
        ];
        DB::table('groups')->insert($data);
    }
}
