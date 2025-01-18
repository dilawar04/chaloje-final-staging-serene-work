<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenityTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        if (!Schema::hasTable('amenities')) {
            Schema::create('amenities', function (Blueprint $table) {
                $table->engine = env('DATABASE_ENGINE');

    $table->Increments("id", 11);
$table->string("title", 100)->nullable();
$table->string("code", 100)->nullable();
$table->string("icon", 50)->nullable();
$table->string("status")->nullable()->default('Active');
$table->integer("ordering", 5)->nullable();
$table->foreignId("group_id", 11)->constrained('groups')->nullable();//->onDelete('cascade');
$table->string("input")->nullable()->default('Yes / No');
$table->string("for")->nullable()->default('All');
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
        Schema::dropIfExists('amenities');
    }
}