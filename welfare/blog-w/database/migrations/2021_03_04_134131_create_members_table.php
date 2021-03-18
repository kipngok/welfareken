<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('image');
            $table->date('dob');
            $table->integer('no_of_children');
            $table->integer('id_number');
            $table->string('home_cell_group');
            $table->string('home_cell_leader');
            $table->string('partner_first_name')->nullable();
            $table->string('partner_middle_name')->nullable();
            $table->string('partner_last_name')->nullable();
            $table->date('partner_dob')->nullable();
            $table->integer('partner_id_number')->nullable();
            $table->string('next_of_kin_first_name')->nullable();
            $table->string('next_of_kin_middle_name')->nullable();
            $table->string('next_of_kin_last_name')->nullable();
            $table->integer('next_of_kin_id_number')->nullable();
            $table->date('date_of_membership')->nullable();

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
        Schema::dropIfExists('members');
    }
}
