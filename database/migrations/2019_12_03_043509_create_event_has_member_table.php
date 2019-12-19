<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventHasMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_has_member', function (Blueprint $table) {           
           $table->unsignedBigInteger('member_id');
           $table->foreign('member_id')->references('id')->on('members');
           $table->unsignedBigInteger('event_id');
           $table->foreign('event_id')->references('id')->on('events');
           $table->integer('jumlah');
           $table->integer('harga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_has_member');
    }
}
