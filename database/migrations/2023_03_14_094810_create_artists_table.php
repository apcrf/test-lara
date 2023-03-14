<?php

// https://www.toptal.com/laravel/restful-laravel-api-tutorial
// cd D:\Server\web\test-lara\
// php artisan make:model Artist -m
// php artisan migrate
// Откат миграций, при необходимости
// php artisan migrate:reset
// php artisan migrate:rollback
// php artisan migrate:rollback --step=3

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id('artist_id')->unique();
            $table->string('artist_name');
            $table->text('artist_note');
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
        Schema::dropIfExists('artists');
    }
};
