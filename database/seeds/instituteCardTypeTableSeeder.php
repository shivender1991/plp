<?php

use Illuminate\Database\Seeder;

class instituteCardTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_instituteCardType')->insert([
            'instituteId' => Int::random(8),
            'cardTypeId' => Int::random(2),
            'status' => 0,
            'createdBy' => 1
        ]);
    }
}
