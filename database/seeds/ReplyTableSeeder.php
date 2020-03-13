<?php

use Illuminate\Database\Seeder;
use App\Reply;
class ReplyTableSeeder extends Seeder
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
            $reply = new Reply;
            $reply->reply = $faker->realText(140);
            $reply->user_id = $i;
            $reply->post_id = $i;
            $reply->save();
        }
    }
}
