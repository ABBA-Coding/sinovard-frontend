<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('show_price')->default(1);
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('address')->nullable();
            $table->text('meta_tags')->nullable();
            $table->text('phone')->nullable();
            $table->string('email', 40)->nullable();
            $table->string('email2', 40)->nullable();
            $table->string('instagram', 500)->nullable();
            $table->string('twitter', 500)->nullable();
            $table->string('vk', 500)->nullable();
            $table->string('facebook', 500)->nullable();
            $table->string('telegram', 500)->nullable();
            $table->string('linkedin', 500)->nullable();
            $table->string('youtube', 500)->nullable();
            $table->string('map_iframe', 500)->nullable();
            $table->string('map_link', 500)->nullable();
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
        Schema::dropIfExists('settings');
    }
}
