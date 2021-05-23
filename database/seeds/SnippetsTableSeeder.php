<?php

use App\Models\Category;
use App\Models\Snippet;
use App\Models\Tag;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SnippetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $categories = collect(Category::all()->modelKeys());
        $tags = collect(Tag::all()->modelKeys());

        for ($i=0; $i < 30; $i++) {
            Snippet::create([
                'title' => $faker->word,
                'description' => $faker->text,
                'status' => $faker->boolean,
                'code' => $faker->text,
                'tag_id' => $categories->random(),
                'category_id' => $tags->random(),
            ]);
        }
    }
}
