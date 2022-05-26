<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('slot')->comment('SlotSlotEnum');
            $table->date('date');
            $table->foreignId('teacher_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('classs_id')->constrained();
            $table->unique(['slot', 'date', 'subject_id', 'classs_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slots');
    }
}
