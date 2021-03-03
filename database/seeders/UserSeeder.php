<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user->fill([
            'name' => 'felipe',
            'email' => 'felipe@gmail.com',
            'password' => Hash::make('123'),
        ]);
        $user->save();
    }
}
