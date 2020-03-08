<?php 

use Illuminate\Database\Seeder;
use App\Post;
class PostsTableSeeder extends Seeder
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
            $post = new Post;
            $post->tweet = $faker->realText(140);
            $post->user_id = $i;
          
            $post->save();
        }
    }
}