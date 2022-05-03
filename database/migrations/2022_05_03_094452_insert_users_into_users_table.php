<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertUsersIntoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $users =
            [
                ["Raphael", "r.kalinowski@mazarine.com","root"],
                ["Julien", "j.schmitt@mazarine.com","root"],
                ["Pierre", "p.bonnefoi@mazarine.com","root"],
                ["Franck", "f.dace@mazarine.com","root"],
                ["Yassine", "y.benazziz@mazarine.com","root"],
                ["Didier", "d.poupry@mazarine.com","root"],
                ["Camille", "c.gilbert@mazarine.com","root"],
            ];

        foreach ($users as $user)
        {
            DB::table('users')->insert([
                    'name' => $user[0],
                    'email' => $user[1],
                    'password' => $user[2],
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
        Schema::dropIfExists('users');
    }
}
