<?php

use Illuminate\Database\Seeder;
use App\Consumable;

class ConsumableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            0 => [
                'name' => 'Diverse Frisdrank 330ml',
                'category' => '1',
                'description' => 'Diverse frisdrank van 330ml, zoals Coco Cola, Fanta. Sprite, etc.',
                'price' => '1.5',
            ],
            1 => [
                'name' => 'Chickenburger',
                'category' => '2',
                'description' => 'Een overheerlijke burger gemaakt van 100% kippenvlees',
                'price' => '2.75',
            ],
            2 => [
                'name' => 'Friet',
                'category' => '3',
                'description' => 'Friet gemaakt van echte aardappelen met een saus naar keuze',
                'price' => '2.25',
            ],
        ];

        $trashhold = 3;
        for($i = 0; $i < $trashhold; $i++){
            $secondTrashhold = 3;
            for($j = 0; $j < $secondTrashhold; $j++){
                $consumable = new Consumable;
                $consumable->restaurant_id = $i + 1;
                $consumable->name = $products[$j]['name'];
                $consumable->category = $products[$j]['category'];
                $consumable->description = $products[$j]['description'];
                $consumable->price = $products[$j]['price'];
                $consumable->save();
            }
        }
    }
}