<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BillTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(HandleTableSeeder::class);

        $this->call(LogsTableSeeder::class);
        $this->call(StatusTableSeeder::class);
    }
}
