<?php

use Illuminate\Database\Seeder;

class institutePaymentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_institutePaymentType')->insert([
            'instituteId' => Int::random(10),
            'paymentTypeId' => Int::random(8),
            'status' => 0,
            'createdBy' => 1
        ]);
    }
}
