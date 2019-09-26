<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->first_name = 'test';
        $user->last_name = 'user';
        $user->email = 'test@test.com';
        $user->password = Hash::make('Welcome01');
        $user->address = 'testlaan';
        $user->zipcode = '1070QR';
        $user->city = 'Amsterdam';
        $user->phone = '0612345678';
        $user->save();

        $trashhold = 3;
        for($i = 0; $i < $trashhold; $i++){
            $user = new User;
            $user->first_name = 'user-'.Str::random(5);
            $user->last_name = 'last-'.Str::random(5);
            $user->email = Str::random(10).'@test.com';
            $user->password = Hash::make('password');
            $user->address = Str::random(10);
            $user->zipcode = rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).Str::random(2);
            $user->city = 'Amsterdam';
            $user->phone = '06'.rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9);
            $user->save();
        }
    }
}
