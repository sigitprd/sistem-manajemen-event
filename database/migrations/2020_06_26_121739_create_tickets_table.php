<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_name');
            $table->foreignId('ctg_id')->references('id')->on('category_tickets');
            $table->longText('description')->nullable();
            $table->float('price');
            $table->date('start_sale');
            $table->date('end_sale');
            $table->string('ticket_photo');
            $table->string('quantity');
            $table->foreignId('event_id')->references('id')->on('events');
            $table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('tickets');
    }
}
