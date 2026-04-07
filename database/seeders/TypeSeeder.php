<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Type;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $types = [
            ['Type_ID' => 1, 'Type_name' => 'Villa'],
            ['Type_ID' => 2, 'Type_name' => 'House'],
            ['Type_ID' => 3, 'Type_name' => 'Apartment'],
            ['Type_ID' => 4, 'Type_name' => 'Studio'],
            ['Type_ID' => 5, 'Type_name' => 'Penthouse'],
            ['Type_ID' => 6, 'Type_name' => 'Duplex'],
            ['Type_ID' => 7, 'Type_name' => 'Townhouse'],
            ['Type_ID' => 8, 'Type_name' => 'Chalet'],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
