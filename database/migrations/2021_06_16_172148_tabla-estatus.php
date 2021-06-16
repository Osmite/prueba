<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaEstatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estatus', function (Blueprint $table) {
            $table->id('clave')->autoIncrement();
            $table->string('descripcion')->nullable();

            $table->unsignedBigInteger('area')->nullable();
            $table->foreign('area')->references('clave')->on('areas')->onDelete('set null');

            $table->unsignedBigInteger('departamento')->nullable();
            $table->foreign('departamento')->references('clave')->on('departamentos')->onDelete('set null');
            
            $table->integer('estatus')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estatus');

    }
}
