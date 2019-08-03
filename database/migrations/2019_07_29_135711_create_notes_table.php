<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cat_id');
            $table->integer('user_id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('details')->nullable();
            $table->double('price');
            $table->text('description');
            $table->string('intended')->default('students');
            $table->string('notes');
            $table->string('coverimage')->default('coverimage.jpg');
            $table->string('doctype')->default('pdf');
            $table->integer('pages')->default(0);
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('notes');
    }
}
