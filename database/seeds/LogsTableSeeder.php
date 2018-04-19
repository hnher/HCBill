<?php

use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logs')->insert([
            'users_id' => 1,
            'status_id'=> 9,
            'operating_id'=> 7,
            'last_time'=> time(),
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }
}
