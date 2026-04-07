<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    public function run()
    {
        $properties = [];
        $property_statuses = ['Rent','Buy'];
        for ($i = 1; $i <= 5; $i++) {
            $properties[] = [
                'TypeID' => 1, // adjust according to your Types table
                'PublisherType' => 'Owner',
                'Publisher_id' => 1, // static publisher
                'location' => 'Cairo, Egypt',
                'Description' => 'Test property number ' . $i,
                'Area' => 120 + ($i * 10),
                'price' => 1000000 + ($i * 50000),
                'Bedrooms' => 2 + $i,
                'Bathrooms' => 1 + ($i % 2),
                'Property_Image' => 'test_property.jpeg',
                'Phone' => '01000000000',
                'PropertyStatus'=>$property_statuses[array_rand($property_statuses)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Property::insert($properties);
    }
}