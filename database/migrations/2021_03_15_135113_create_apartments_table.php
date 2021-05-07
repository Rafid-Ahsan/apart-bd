<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('description');
            $table->string('house_number');
            $table->string('house_image');
            $table->string('road');
            $table->string('area');
            $table->string('thana');
            $table->string('district');
            $table->string('division');
            $table->string('zip_code');
            $table->integer('rent');
            $table->integer('beds');
            $table->integer('baths');
            $table->integer('garage')->default(0);
            $table->integer('balcony')->default(0);
            $table->enum('status', ['sale', 'sold'])->default('sale');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
