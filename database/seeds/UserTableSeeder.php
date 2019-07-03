<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('password_resets')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');



        // Insert admin
            DB::table('users')->insert(
                array(
                    'first_name'      => 'Test',
                    'last_name' => 'admin',
                    'email'     => 'admin@admin.com',
                    'password'  => bcrypt('123456'),
                    'address' => 'Samanabad',
                    'city' => 'faisalabad',
                    'state' => 'USA', 
                    'zipcode' =>  '38000',
                    'notes' => 'hello this is admin',
                    'phone' => '03246845384',
                    'user_type'  => 'admin'
                )
            );

            for ($i=0; $i < 5; $i++) { 
               $faker = Faker::create(); 
               // Insert user
               DB::table('users')->insert(
                   array(
                       'name'      => $faker->name,
                       'email'     => $faker->email,
                       'password'  => bcrypt('secret'),
                       'type'  => 'admin'
                   )
               );

            }

            
           
    }
}
