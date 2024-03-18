<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = file_get_contents(database_path('data/firstAdmin.json'));

        // Create an employee from the decoded JSON
        $employee = new Customer(json_decode($jsonFile, true));

        $employee->password = Hash::make($employee->password);

        // Save the employee in the database
        $employee->save();
    }
}
