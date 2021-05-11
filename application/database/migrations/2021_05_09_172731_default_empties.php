<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DefaultEmpties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('records')) {
            Schema::table('records', function (Blueprint $table) {
                $table->json('data')->nullable()->change();
                $table->json('metadata')->nullable()->change();
            });
        }

        if (Schema::hasTable('collections')) {
            Schema::table('collections', function (Blueprint $table) {
                $table->json('data')->nullable()->change();
                $table->text('description')->nullable()->change();
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
        //
    }
}
