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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prof_pic')->nullable();
            // $table->date('date_joined');
            $table->char('sex',1);
            $table->string('fname');
            $table->string('lname');
            $table->string('username',50)->unique();
            $table->string('password');
            $table->string('latitude',100)->nullable();
            $table->string('longitude',100)->nullable();
            $table->string('email',50)->unique();
            $table->date('birthdate');
            
           
            // $table->floatval(var)
            $table->rememberToken();
            $table->timestamps();
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
