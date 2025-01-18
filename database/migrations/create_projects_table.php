<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        if (!Schema::hasTable('projects')) {
            Schema::create('projects', function (Blueprint $table) {
                $table->engine = env('DATABASE_ENGINE');

    $table->Increments("id", 11);
$table->string("title", 255)->nullable();
$table->string("logo", 150)->nullable();
$table->char("country", 20)->nullable()->default('PK');
$table->foreignId("city_id", 11)->constrained('cities')->nullable();//->onDelete('cascade');
$table->foreignId("area_id", 11)->constrained('areas')->nullable();//->onDelete('cascade');
$table->string("short_description")->nullable();
$table->string("description")->nullable();
$table->string("price_from")->nullable();
$table->string("price_to")->nullable();
$table->foreignId("developer_id", 11)->constrained('developers')->nullable();//->onDelete('cascade');
$table->string("created")->nullable();
$table->integer("created_by", 11)->nullable();
$table->string("status")->nullable()->default('Inactive');
$table->string("floor_plans")->nullable();
$table->string("payment_plans")->nullable();
$table->string("project_map", 255)->nullable();
$table->string("videos")->nullable();
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
        Schema::dropIfExists('projects');
    }
}