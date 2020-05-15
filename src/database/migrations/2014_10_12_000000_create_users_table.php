<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $collection) {
            $collection->unique('email');
            $collection->string('password')->nullable();
            $collection->string('slug');
            $collection->boolean('email_verified');
            $collection->string('name');
            $collection->string('role');
            $collection->boolean('personal');
            $collection->date('dateBirth');
            $collection->string('sexo');
            $collection->string('level');
            $collection->string('objective');
            $collection->rememberToken();
            $collection->timestamps();
        });
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
