<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAuthrizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authrizations', function (Blueprint $table) {
            $table->text('refresh_token')->nullable()->change();
            $table->text('access_token')->nullable();
            $table->string('token_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authrizations', function (Blueprint $table) {
            //
        });
    }
}
