<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriorityToTagPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tag_post', function (Blueprint $table) {
            $table->boolean('priority')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tag_post', function (Blueprint $table) {
            if (Schema::hasColumn('tag_post', 'priority'))
            {
                Schema::dropColumns('tag_post', 'priority');
            }
        });
    }
}
