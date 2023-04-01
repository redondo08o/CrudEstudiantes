<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->text("uid");
            $table->string('nombres');
            $table->string('apellidos');
            $table->bigInteger('telefono');
            $table->string('email');
            $table->string('tp_doc');
            $table->string('n_doc');
            $table->integer('est');
            $table->unsignedBigInteger('id_curso');
            $table->timestamps();
            $table->foreign('id_curso')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
