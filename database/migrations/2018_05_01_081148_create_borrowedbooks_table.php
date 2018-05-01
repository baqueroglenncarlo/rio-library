<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowedbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowedbooks', function (Blueprint $table) {
            $table->myengine    = 'MyIsam';
            $table->charset     = 'utf8';
            $table->collation   = 'utf8_unicode_ci';
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('book_id');
            $table->date('dateborrowed');
            $table->date('datereturn');
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
        Schema::dropIfExists('borrowedbooks');
    }
}
