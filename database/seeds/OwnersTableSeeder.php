<?php

use App\User;
use Illuminate\Database\Seeder;

class OwnersTableSeeder extends Seeder
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

        factory(User::class, 40)->states('owner')->create();
    }
}
