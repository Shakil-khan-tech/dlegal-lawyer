<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambers', function (Blueprint $table) {
            $table->id();
            $table->string('ch_name')->nullable();
            $table->string('ch_logo')->nullable();
            $table->string('ch_telephone')->nullable();
            $table->string('ch_mobile_one')->nullable();
            $table->string('ch_mobile_two')->nullable();
            $table->string('ch_email_one')->nullable();
            $table->string('ch_email_two')->nullable();
            $table->text('ch_main_office_address')->nullable();
            $table->text('ch_office_one_address')->nullable();
            $table->text('ch_office_two_address')->nullable();
            $table->string('ch_person_type')->nullable();
            $table->string('ch_person_signature')->nullable();
            $table->text('ch_letter_write_up')->nullable();
            $table->text('ch_letter_address')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('chambers');
    }
}
