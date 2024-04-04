<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventCategorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = file_get_contents(database_path('data/eventCategories.json'));
        //create typeEvent for all lines in the json file
        foreach (json_decode($jsonFile, true) as $typeEvent) {
            $typeEvent = new EventCategorie($typeEvent);
            $typeEvent->save();
        }
    }
}
