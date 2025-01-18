<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        if (!Schema::hasTable('income')) {
            Schema::create('income', function (Blueprint $table) {
                $table->engine = env('DATABASE_ENGINE');

    $table->Increments("id", 11);
$table->foreignId("user_id", 20)->constrained('users')->nullable();//->onDelete('cascade');
$table->foreignId("rel_id", 11)->constrained('rels')->nullable();//->onDelete('cascade');
$table->string("title", 255)->nullable();
$table->string("income_head", 100)->nullable();
$table->string("date")->nullable();
$table->string("amount")->nullable()->default('0.00');
$table->string("created_at")->nullable();
$table->integer("created_by", 11)->nullable();
$table->string("status")->nullable()->default('In-Process');
$table->string("note")->nullable();
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
        Schema::dropIfExists('income');
    }
}