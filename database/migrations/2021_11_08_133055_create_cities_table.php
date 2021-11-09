<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /** @return void */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('reference');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /** @return void */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
}
