<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('number_type_id');
            $table->foreign('number_type_id')->references('id')->on('numbers_type');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_informations');
            $table->integer('number');
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
        $table->dropForeign('contacts_number_type_id_foreign');
        $table->dropForeign('contacts_user_id_foreign');
        Schema::dropIfExists('contacts');
    }
}
