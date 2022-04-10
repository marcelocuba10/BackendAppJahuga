<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::create([
            'first_name' => 'User teste', 
            'last_name' => 'user', 
            'phone' => '168451212', 
            'address' => 'av menusu 521', 
            'email' => 'user@user.com',
            'password' => 'teste123',
            'terms' => '1'
        ]);
    }
}
