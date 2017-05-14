<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OwnersTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(CarTypesTableSeeder::class);
        $this->call(CarsTableSeeder::class);
    }
}
