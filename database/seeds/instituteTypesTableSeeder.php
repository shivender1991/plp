<?php

use Illuminate\Database\Seeder;

class instituteTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_instituteTypes')->insert([
            'name' => Str::random(10),
            'code' => Int::random(8),
            'status' => 0,
            'createdBy' => 1
        ]);
    }
}
