<?php

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
        Schema::create('disks', function (Blueprint $table) {
            $table->id('disk_id')->unique();
            $table->unsignedBigInteger('disk_artist_id');
            $table->string('disk_name', 255);
            $table->integer('disk_no');
            $table->integer('disk_year');
            $table->unsignedBigInteger('disk_publisher_id');
            $table->text('disk_note')->nullable();
            $table->timestamps();
            // Relationships
            $table->foreign('disk_artist_id')->references('artist_id')->on('artists');
            $table->foreign('disk_publisher_id')->references('publisher_id')->on('publishers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disks');
    }
};
