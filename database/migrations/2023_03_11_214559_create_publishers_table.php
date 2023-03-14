<?php

// D:\server\web\test-lara> php artisan make:model Publisher -m
// D:\server\web\test-lara> php artisan migrate
//
// Откат миграций, при необходимости
// D:\server\web\test-lara> php artisan migrate:reset
// D:\server\web\test-lara> php artisan migrate:rollback
// D:\server\web\test-lara> php artisan migrate:rollback --step=3

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
        Schema::create('publishers', function (Blueprint $table) {
            $table->id('publisher_id');
            $table->string('publisher_name');
            $table->text('publisher_note');
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
        Schema::dropIfExists('publishers');
    }
};
