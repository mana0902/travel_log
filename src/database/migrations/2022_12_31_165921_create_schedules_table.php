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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('filename_1')->nullable();
            $table->string('filename_2')->nullable();
            $table->string('filename_3')->nullable();
            $table->string('filename_4')->nullable();
            $table->string('destination');
            $table->string('comment');
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
        Schema::dropIfExists('schedules');
    }
};
