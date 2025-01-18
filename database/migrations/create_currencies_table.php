<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('currencies')) {
            Schema::create('currencies', function (Blueprint $table) {
                $table->engine = env('DATABASE_ENGINE');

                $table->Increments("id", 11);
                $table->string("currency", 50)->nullable();
                $table->string("short_name", 10)->nullable();
                $table->string("symbol", 10)->nullable();
                $table->string("status")->nullable();
                $table->timestamps();
//$table->softDeletes();            //$table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}