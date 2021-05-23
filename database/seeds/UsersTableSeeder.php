<?php

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 100; $i++) {
            User::create([
                'name' => $faker->name ,
                'username' => $faker->userName ,
                'email' => $faker->email ,
                'password' => bcrypt($faker->password) ,
            ]);
        }

    }
}
