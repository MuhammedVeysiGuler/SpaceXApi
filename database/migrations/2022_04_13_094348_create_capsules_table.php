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
        Schema::create('capsules', function (Blueprint $table) {
            $table->id();
            $table->string('capsule_id');
            $table->string('capsule_serial');
            $table->string('status');
            $table->dateTime('original_launch')->nullable();
            $table->bigInteger('original_launch_unix')->nullable();
            $table->tinyInteger('landings')->nullable();
            $table->string('type')->nullable();
            $table->string('details')->nullable();
            $table->integer('reuse_count')->nullable();
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
        Schema::dropIfExists('capsules');
    }
};
