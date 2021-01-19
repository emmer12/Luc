<?php

use Illuminate\Database\Seeder;

class properties extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
            'property_id' => rand(25033,35093),
            'landuse' => 'Residential',
            'address' => 'No 1 alagbaka',
            'registration'=>true
        ]);

        DB::table('properties')->insert([
            'property_id' => rand(25033,35093),
            'landuse' => 'Residential',
            'address' => 'No 2 alagbaka',
            'registration'=>true
        ]);

        DB::table('properties')->insert([
            'property_id' => rand(25033,35093),
            'landuse' => 'Recreational',
            'address' => 'No 3 alagbaka',
            'registration'=>true
        ]);

        DB::table('properties')->insert([
            'property_id' => rand(25033,35093),
            'landuse' => 'Residential',
            'address' => 'No 4 alagbaka',
            'registration'=>false
        ]);
        DB::table('properties')->insert([
            'property_id' => rand(25033,35093),
            'landuse' => 'Residential',
            'address' => 'No 5 alagbaka',
            'registration'=>true
        ]);
        DB::table('properties')->insert([
            'property_id' => rand(25033,35093),
            'landuse' => 'Residential',
            'address' => 'No 6 alagbaka',
            'registration'=>true
        ]);
        DB::table('properties')->insert([
            'property_id' => rand(25033,35093),
            'landuse' => 'Residential',
            'address' => 'No 7 alagbaka',
            'registration'=>false
        ]);

        DB::table('properties')->insert([
            'property_id' => rand(25033,35093),
            'landuse' => 'Industrial',
            'address' => 'No 8 alagbaka',
            'registration'=>false
        ]);
        DB::table('properties')->insert([
            'property_id' => rand(25033,35093),
            'landuse' => 'Residential',
            'address' => 'No 9 alagbaka',
            'registration'=>true
        ]);
        DB::table('properties')->insert([
            'property_id' => rand(25033,35093),
            'landuse' => 'Hotel',
            'address' => 'No 10 alagbaka',
            'registration'=>false
        ]);
    }
}
