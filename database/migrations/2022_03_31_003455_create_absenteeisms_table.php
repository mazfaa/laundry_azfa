<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenteeismsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absenteeisms', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name', 191);
            $table->date('signin_date');
            $table->time('signin_time');
            $table->enum('status', ['Masuk', 'Cuti', 'Sakit']);
            $table->time('time_to_finish_work')->nullable();
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
        Schema::dropIfExists('absenteeisms');
    }
}
