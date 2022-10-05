<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

            DB::table('users')->insert
            ([
                [
                'name' => 'Cristiano',

                'email' => 'cr7@gmail.com',

                'password' => Hash::make('12345678'), 
               
                'created_at' => date('Y-m-d H:i:s'),

                'updated_at' => date('Y-m-d H:i:s')
                ],
                
                [
                    'name' => 'Messi',
    
                    'email' => 'messi@gmail.com',
    
                    'password' => Hash::make('12345678'), 
                   
                    'created_at' => date('Y-m-d H:i:s'),
    
                    'updated_at' => date('Y-m-d H:i:s')
                    ],  

            ]);

        
    }
}
