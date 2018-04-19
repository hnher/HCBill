<?php

use Illuminate\Database\Seeder;

class BillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill')->insert([
            'handle_id'=>1,
            'user_id'=>1,
            'project_id'=>1,
            'name'=>'高级水杯',
            'amount'=>1000,
            'price'=>60,
            'cash_disburse'=>2000,
            'cash_recover'=>2000,
            'oil_disburse'=>2000,
            'oil_recover'=>2000,
            'actual_disburse'=>2000,
            'remaining'=>2000,
            'customize_time'=> time(),
            'created_at' => time(),
            'updated_at' => time(),

        ]);
    }
}
