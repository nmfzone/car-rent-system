<?php

use App\User;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->states('customer')->create([
            'name' => 'Customer',
            'username' => 'customer',
            'password' => bcrypt('12345678')
        ]);

        factory(User::class, 40)->states('customer')->create();
    }
}
