<?php

use Illuminate\Database\Seeder;

class workflowStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_flow_Status')->insert([
            'statusName' => Str::random(10),
            'code' => Str::random(10),
            'status' => 0,
            'createdBy' => 1
        ]);
    }
}
