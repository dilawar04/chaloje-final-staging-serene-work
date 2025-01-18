<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectBlockTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        if (!Schema::hasTable('project_blocks')) {
            Schema::create('project_blocks', function (Blueprint $table) {
                $table->engine = env('DATABASE_ENGINE');

    $table->Increments("id", 11);
$table->foreignId("project_id", 11)->constrained('projects')->nullable();//->onDelete('cascade');
$table->string("title", 255)->nullable();
$table->string("area")->nullable();
$table->string("area_unit")->nullable()->default('Square Feet');
$table->string("square_meter")->nullable();
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
        Schema::dropIfExists('project_blocks');
    }
}