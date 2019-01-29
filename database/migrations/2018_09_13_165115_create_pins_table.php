<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial')->unique();
            $table->string('pin')->unique();
            $table->float('amount', 8, 2);
            $table->string('user_id', 14)->nullable();
            $table->string('bank')->nullable();
            $table->string('batch_no');
            $table->string('account_sent_to')->nullable();
            $table->enum('status', ['generated','live', 'pending', 'used'])->default('generated');
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
        Schema::dropIfExists('pins');
    }
}
