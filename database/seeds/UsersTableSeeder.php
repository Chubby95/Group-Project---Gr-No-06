<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_roles = array(
            "Dean",
            "Assistant Registar",
            "Dean office clark",
            "Head of the department",
            "HOD clark",
            "student"
        );
        
        foreach ($user_roles as $key => $value) {
            DB::table('user_roles')->insert([
            'roleType'=> $value
        ]);
        }
        
    }
}
