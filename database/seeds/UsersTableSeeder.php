<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i < 6; $i++) {
            $user = new User;
            $user->name = $faker->lastName;
            $user->avatar = $faker->image('public/img/',640,480, 'animals', false);
            $user->email = $faker->unique()->email;
            $user->password = bcrypt('123456');
            $user->save();
        }
    }
}
