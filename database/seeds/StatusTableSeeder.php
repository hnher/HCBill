<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([

            [
                'status_name' => '添加',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'status_name' => '修改',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'status_name' => '删除',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'status_name' => '经手人',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'status_name' => '项目名',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'status_name' => '账单',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'status_name' => '会员信息',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'status_name' => '退出',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'status_name' => '登陆',
                'created_at' => time(),
                'updated_at' => time(),
            ],
        ]);
    }
}
