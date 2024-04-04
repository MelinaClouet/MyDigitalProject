<?php

namespace Database\Seeders;

use App\Models\EventVariation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventVariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = file_get_contents(database_path('data/eventVariations.json'));
        //create typeEvent for all lines in the json file
        foreach (json_decode($jsonFile, true) as $typeEvent) {
            $typeEvent = new EventVariation($typeEvent);
            $typeEvent->save();
        }
    }
}
