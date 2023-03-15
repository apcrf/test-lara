<?php

// cd D:\Server\web\test-lara\
// php artisan make:model Publisher -m
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
        Schema::create('publishers', function (Blueprint $table) {
            $table->id('publisher_id')->unique();
            $table->string('publisher_name');
            $table->text('publisher_note')->nullable();
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
