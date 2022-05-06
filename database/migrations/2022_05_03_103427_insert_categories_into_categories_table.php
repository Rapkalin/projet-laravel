<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;

class InsertCategoriesIntoCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories =
            [
                ['name' => "Photography", 'slug' => "photography", 'description' => "All about photography"],
                ['name' => "Illustration", 'slug' => "illustration",'description' => "Discover all about illustration from the conception to the drawings"],
                ['name' => "Coding", 'slug' => "coding", 'description' => "Backend, frontend, discover the best tips for coding"],
                ['name' => "NFT", 'slug' => "nft", 'description' => "Metaverse and NFT will have no secret for you anymore"],
                ['name' => "Travel", 'slug' => "travel", 'description' => "Wanna travel like a local? You are in the right place"],
                ['name' => "Music", 'slug' => "music", 'description' => "Wanna learn more about guitar or piano? Discover our tips and lessons"],
                ['name' => "Gardening", 'slug' => "gardening", 'description' => "Do know how to take care of your plants? Follow the guide"],
            ];

        foreach ($categories as $categorie)
        {
            DB::table('categories')->insert([
                    'name' => $categorie['name'],
                    'slug' => $categorie['slug'],
                    'description' => $categorie['description'],
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Post::query()->delete();
    }
}
