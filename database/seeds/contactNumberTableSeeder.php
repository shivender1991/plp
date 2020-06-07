<?php

use Illuminate\Database\Seeder;

class contactNumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_contactNumber')->insert([
            'userId' => 1,
            'contactNumber' => Int::random(12),
            'contactType' => Str::random(10),
            'status' => 0,
            'createdBy' => 1
        ]);
    }
}
