<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEOrganizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_organizers', function (Blueprint $table) {
            $table->id();
            $table->string('name_eo');
            $table->longText('address_eo');
            $table->string('phone_number_eo');
            $table->string('identity_card_eo');
            $table->string('support_doc');
            $table->string('npwp');
            $table->foreignId('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('e_organizers');
    }
}
