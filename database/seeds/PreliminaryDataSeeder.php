<?php

use App\User;
use App\CarType;
use Illuminate\Database\Seeder;

class PreliminaryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->states('owner')->create([
            'name' => 'Owner',
            'username' => 'owner',
            'password' => bcrypt('12345678'),
        ]);

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
