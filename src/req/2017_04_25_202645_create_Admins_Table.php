<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        // Insert admin's account
        DB::table('admins')->insert(
            array(
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password'  => Hash::make('111111'),
            )
        );
        // Insert team member's account
        DB::table('admins')->insert(
            array(
                'name' => 'team',
                'email' => 'team@example.com',
                'password'  => Hash::make('111111'),
            )
        );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Admins');
    }
}
