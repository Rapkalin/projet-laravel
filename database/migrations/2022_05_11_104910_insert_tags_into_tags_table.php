<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Tag;

class InsertTagsIntoTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tags =
            [
                [
                    'name' => "guitare",
                    'description' => "instrument de musique",
                ],
                [
                    'name' => "piano",
                    'description' => "instrument de musique",
                ],
                [
                    'name' => "php",
                    'description' => "language programmation",
                ],
                [
                    'name' => "ruby",
                    'description' => "language programmation",
                ],
                [
                    'name' => "Bored apes",
                    'description' => "NFT project",
                ],
                [
                    'name' => "Plantes d'intérieur",
                    'description' => "Regroupe tous les types de plantes d'intérieur",
                ],
                [
                    'name' => "France",
                    'description' => "Bons plans voyage en France",
                ],
                [
                    'name' => "Portugal",
                    'description' => "Bons plans voyage au Portugal",
                ],
                [
                    'name' => "Traditionnelle",
                    'description' => "Illustration à la main sans PAO",
                ],
            ];

        foreach ($tags as $key => $tag)
        {
            DB::table('tags')->insert([
                    'name' => $tag['name'],
                    'slug' => Str::slug($tags[$key]['name'], '-'),
                    'description' => $tag['description'],
                    ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Tag::query()->delete();
    }
}
