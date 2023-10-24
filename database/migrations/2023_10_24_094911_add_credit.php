<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->integer('credit_type');
            $table->string('name');
            $table->string('status');
            $table->integer('total_credit');
            $table->integer('total_transaction');
            $table->datetime('tenor');
            $table->string('item');
            $table->string('attribute');
            $table->timestamps();
            $table->datetime('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit');
    }
};
