<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'tu';
        $user->role_id = 1;
        $user->username = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('admin123');
        $user->save();
    }
}
