<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectPropertyTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        if (!Schema::hasTable('project_properties')) {
            Schema::create('project_properties', function (Blueprint $table) {
                $table->engine = env('DATABASE_ENGINE');

    $table->Increments("id", 11);
$table->foreignId("project_id", 11)->constrained('projects')->nullable();//->onDelete('cascade');
$table->foreignId("type_id", 11)->constrained('types')->nullable();//->onDelete('cascade');
$table->string("title", 255)->nullable();
$table->string("area")->nullable();
$table->string("area_unit")->nullable()->default('Square Feet');
$table->string("square_meter")->nullable();
$table->string("price")->nullable();
$table->integer("bedrooms", 4)->nullable();
$table->integer("bathrooms", 4)->nullable();
$table->string("floor_plans")->nullable();
$table->string("payment_plan", 150)->nullable();
$table->string("status")->nullable()->default('Active');
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
        Schema::dropIfExists('project_properties');
    }
}