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
            $table->string('UsFirstname');
            $table->string('UsLastname');
            $table->string('UsNickname');
            $table->string('UsBirthday');
            $table->string('UsPhone');
            $table->integer('UsCoins');
            $table->unsignedInteger('municipio_id')->nullable();
            $table->string('UsEmail')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('UsRol')->nullable();
            $table->string('UsRolDesc')->nullable();
            $table->string('UsStatus', 32)->nullable();
            $table->string('UsSlug')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->engine ='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
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
