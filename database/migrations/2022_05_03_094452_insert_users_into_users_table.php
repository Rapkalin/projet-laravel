<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
                ["name" => "Raphael", 'email' => "r.kalinowski@mazarine.com","password" => "root"],
                ["name" => "Julien", 'email' => "j.schmitt@mazarine.com","password" => "root"],
                ["name" => "Pierre", 'email' => "p.bonnefoi@mazarine.com","password" => "root"],
                ["name" => "Franck", 'email' => "f.dace@mazarine.com","password" => "root"],
                ["name" => "Yassine", 'email' => "y.benazziz@mazarine.com","password" => "root"],
                ["name" => "Didier", 'email' => "d.poupry@mazarine.com","password" => "root"],
                ["name" => "Camille", 'email' => "c.gilbert@mazarine.com","password" => "root"],
            ];

        foreach ($users as $user)
        {
            DB::table('users')->insert([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
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
        User::query()->delete();
    }
}
