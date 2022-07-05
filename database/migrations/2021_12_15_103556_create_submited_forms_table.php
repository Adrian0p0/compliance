<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitedFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submited_forms', function (Blueprint $table) {
            $table->id();
            //$table->integer('id_subject')->default(0);
            $table->integer('company_id');
            $table->string('title');
            $table->string('country')->default('')->nullable();
            $table->string('area')->default('')->nullable();
            $table->longText('message');
            $table->string('anonimRenounce')->default(false)->nullable();
            $table->string('mail-phone')->default('')->nullable();
            $table->boolean('still-going')->default(true)->nullable();
            $table->string('lang')->default('en');
            $table->json('files')->collation('utf8mb4_unicode_ci')->nullable();
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
        Schema::dropIfExists('submited_forms');
    }
}
