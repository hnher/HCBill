<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project')->insert([
           [
                'project_name'=>'高铁项目',
                'created_at' => time(),
                'updated_at' => time(),

           ],
            [
                'project_name'=>'金融项目',
                'created_at' => time(),
                'updated_at' => time(),
            ],
        ]);
    }
}
