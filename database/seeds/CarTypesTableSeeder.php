<?php

use App\CarType;
use Illuminate\Database\Seeder;

class CarTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carTypes = collect([
            'Toyota',
            'Honda',
            'Suzuki',
        ]);

        $carTypes->each(function($name) {
            factory(CarType::class)->create([
                'name' => $name,
            ]);
        });
    }
}
