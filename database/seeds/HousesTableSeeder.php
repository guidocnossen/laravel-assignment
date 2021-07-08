<?php

use Illuminate\Database\Seeder;

use App\Models\House; 

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $houses = [
        	[
        		'user_id' => 1,
        		'name' => 'Luxe Villa Groningen',
                'type' => 'villa',
                'surface' => '200m2',
                'rooms' => '6',
                'price' => '1000000',
                'status' => 'verkocht',
        	],
        ];  

        foreach ($houses as $house)
        {
        	House::create($house); 
        }
    }
}
