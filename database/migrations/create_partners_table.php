<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        if (!Schema::hasTable('partners')) {
            Schema::create('partners', function (Blueprint $table) {
                $table->engine = env('DATABASE_ENGINE');

    $table->Increments("id", 11);
$table->string("name", 150)->nullable();
$table->string("logo", 150)->nullable();
$table->string("tag_line", 255)->nullable();
$table->string("description")->nullable();
$table->string("type")->nullable()->default('Associates');
$table->string("link", 255)->nullable();
$table->string("status")->nullable()->default('Active');
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
        Schema::dropIfExists('partners');
    }
}