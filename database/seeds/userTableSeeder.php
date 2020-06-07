<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'firstName' => Str::random(10),
            'lastName' => Str::random(10),
            'email' => Str::random(10).'@getnada.com',
            'password' => Hash::make('Admin@1234'),
            'instituteId' => 1,
            'addressId' => Str::random(10),
            'titleId' => 1,
            'gender' => 0,
            'status' => 0,
            'createdBy' => 1,
        ]);
    }
}
