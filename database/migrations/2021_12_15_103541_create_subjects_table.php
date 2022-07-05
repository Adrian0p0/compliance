<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name-ro');
            $table->string('name-en');
            $table->string('name-de');
            $table->string('description-ro');
            $table->string('description-en');
            $table->string('description-de');
            $table->timestamps();
        });

        $data = [
            [
                'name-ro' => 'Sub 1 Ro',
                'name-de' => 'Sub 1 De',
                'name-en' => 'Sub 1 En',
                'description-ro' => 'Descriere 1 Ro',
                'description-de' => 'Descriere 1 De',
                'description-en' => 'Descriere 1 En',
            ],
            [
                'name-ro' => 'Sub 2 Ro',
                'name-de' => 'Sub 2 De',
                'name-en' => 'Sub 2 En',
                'description-ro' => 'Descriere 2 Ro',
                'description-de' => 'Descriere 2 De',
                'description-en' => 'Descriere 2 En',
            ],
            [
                'name-ro' => 'Sub 3 Ro',
                'name-de' => 'Sub 3 De',
                'name-en' => 'Sub 3 En',
                'description-ro' => 'Descriere 3 Ro',
                'description-de' => 'Descriere 3 De',
                'description-en' => 'Descriere 3 En',
            ],
        ];

        DB::table('subjects')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
