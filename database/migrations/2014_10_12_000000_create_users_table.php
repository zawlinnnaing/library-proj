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
            $table->string('stud_id',50);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('roll_no',50);
            $table->date('expired_date')->nullable();
            $table->string('img_dir')->nullable();
            $table->string('major')->nullable();
            $table->string('year',10)->nullable();
            $table->integer('noti_counts')->unsigned()->default(0);
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
