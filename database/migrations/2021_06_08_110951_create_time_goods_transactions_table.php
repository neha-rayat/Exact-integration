<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeGoodsTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_goods_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('exact_id');
            $table->string('date');
            $table->string('project_name');
            $table->string('project_id');
            $table->string('employe_name')->nullable();
            $table->string('employe_id')->nullable();
            $table->string('product_name');
            $table->string('product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_goods_transactions');
    }
}
