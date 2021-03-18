<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id');
            $table->date('date');
            $table->time('time');
            $table->string('lunch')->nullable();
            $table->string('tea')->nullable();
            $table->integer('amount');
            $table->integer('balance');
            $table->string('narrative')->nullable();
            $table->string('user_id');
            $table->string('status');
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
        Schema::dropIfExists('invoice');
    }
}
