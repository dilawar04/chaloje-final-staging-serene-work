<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->engine = env('DATABASE_ENGINE');

    $table->Increments("id", 11);
$table->char("order_number", 10)->nullable();
$table->foreignId("customer_id", 11)->constrained('customers')->nullable();//->onDelete('cascade');
$table->string("status", 100)->nullable()->default('Process');
$table->string("created")->nullable();
$table->string("discount")->nullable();
$table->string("other_amount")->nullable();
$table->string("total_amount")->nullable();
$table->string("note")->nullable();
$table->string("payment_method")->nullable()->default('Cash');
$table->string("payment_status")->nullable()->default('Unpaid');
$table->integer("created_by", 11)->nullable();
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
        Schema::dropIfExists('orders');
    }
}