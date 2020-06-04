<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i <= 5 ; $i ++){
            DB::table('users')->insert([
                'lastName' => Str::random(10),
                'firstname' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'thunbar'=> 'bgau.jpg',
                'role' => 0,
                'phone' => '0395578355',
                'description' => Str::random(20)
            ]);
        }
        
    }
}
