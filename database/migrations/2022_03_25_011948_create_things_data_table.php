<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThingsDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('things_data', function (Blueprint $table) {
            $table->id();
            $table->string('things_name', 191);
            $table->integer('qty');
            $table->integer('price');
            $table->date('pay_date');
            $table->string('supplier');
            $table->enum('things_status', ['Tersedia', 'Diajukan', 'Habis']);
            $table->date('updated_status_date');
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
        Schema::dropIfExists('things_data');
    }
}
