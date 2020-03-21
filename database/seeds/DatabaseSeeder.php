<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Replies;
use App\Like;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        //$this->call(PostsTableSeeder::class);
         //$this->call(ReplyTableSeeder::class);
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i < 6; $i++) {
            $post = new Post;
            $post->post = $faker->realText(140);
            $post->user_id = $i;
          
            $post->save();
        }

        for ($i = 1; $i < 6; $i++) {
            $user = new User;
            $user->name = $faker->lastName;
            $user->avatar = $faker->image('public/img/',640,480, 'animals', false);
            $user->email = $faker->unique()->email;
            $user->password = bcrypt('123456');
            $user->save();
        }

       
        for ($i = 1; $i < 6; $i++) {
            $reply = new Replies;
            $reply->reply = $faker->realText(140);
            $reply->user_id = $i;
            $reply->post_id = $i;
            $reply->save();
        }

        for ($i = 1; $i < 6; $i++) {
            $reply = new Like;
            $reply->user_id = $i;
            $reply->post_id = $i;
            $reply->save();
        }

       

       
       
    }
}
