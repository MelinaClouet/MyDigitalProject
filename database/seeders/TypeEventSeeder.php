<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\typeEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TypeEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = file_get_contents(database_path('data/typeEvent.json'));
        //create typeEvent for all lines in the json file
        foreach (json_decode($jsonFile, true) as $typeEvent) {
            $typeEvent = new typeEvent($typeEvent);
            $typeEvent->save();
        }

    }
}
