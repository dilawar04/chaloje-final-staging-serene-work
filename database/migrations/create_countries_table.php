<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        if (!Schema::hasTable('countries')) {
            Schema::create('countries', function (Blueprint $table) {
                $table->engine = env('DATABASE_ENGINE');

    $table->Increments("idCountry", 5);
$table->char("countryCode", 2)->nullable();
$table->string("countryName", 45)->nullable();
$table->char("currencyCode", 3)->nullable();
$table->char("continent", 2)->nullable();
            //$table->timestamps();
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
        Schema::dropIfExists('countries');
    }
}