<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvantageTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advantage_translates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advantage_id')->constrained('advantages')->onDelete('cascade');
            $table->string('title', 400);
            $table->string('description', 500)->nullable();
            $table->integer('lang')->index()->nullable();
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
        Schema::dropIfExists('advantage_translates');
    }
}
