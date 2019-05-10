<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('AuditType'); /*create, update etc*/
            $table->string('AuditTabla'); /*tabla modificada*/
            $table->string('AuditRegistro'); /*id de la tabla modificada*/
            $table->unsignedInteger('user_id'); /*usuario que realizo la modificacion*/
            $table->json('Auditlog'); /*coniene toda la informacion del request con el que solicita el update en formato Json, si el request tiene archivos tambien viene el nombre del archivo nuevo*/
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->engine = 'InnoDB';
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
        Schema::dropIfExists('audits');
    }
}
