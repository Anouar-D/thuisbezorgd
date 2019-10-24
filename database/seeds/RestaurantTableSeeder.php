<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Restaurant;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            'Burgerking',
            'Steakhouse',
            'Donorzaak',
        ];
        $cities = [
            'Amsterdam',
            'Rotterdam',
            'Den Haag',
            'Haarlem',
        ];

        $trashhold = 3;
        for($i = 0; $i < $trashhold; $i++){
            $restaurant = new Restaurant;
            $restaurant->user_id = rand(1, $i + 1);
            $restaurant->title = $restaurants[$i];
            $restaurant->email = 'info@'.$restaurants[$i].'.com';
            $restaurant->address = $restaurants[$i].'straat';
            $restaurant->zipcode = rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).Str::random(2);
            $restaurant->city = $cities[rand(0, 3)];
            $restaurant->phone = '06'.rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9);
            $restaurant->opened_at = '11:00';
            $restaurant->closed_at = '23:00';
            $restaurant->save();
        }
    }
}
