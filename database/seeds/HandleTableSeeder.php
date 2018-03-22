<?php

use Illuminate\Database\Seeder;

class HandleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('handle')->insert([
            [
                'handle_name'=>'王先生',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'handle_name'=>'李先生',
                'created_at' => time(),
                'updated_at' => time(),
            ],

        ]);
    }
}
