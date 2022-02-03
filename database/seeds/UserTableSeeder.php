<?php

use Illuminate\Database\Seeder;
 use App\Role;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *      
     * @return void
     */
    public function run()
{
    
    $roles = Role::get();
    DB::table('users')->insert([
        [
            'name' => 'admin',
            'role_id'=>$roles[0]->id,
            'email'=>'rutul@gmail.com',
            'contactno'=>'7567405047',
            'password'=>Hash::make('rutul@gmail.com'),
        ],
        
       ]);
}
}

