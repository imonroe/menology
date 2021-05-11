<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Corrections extends Migration
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
                $table->uuid('collection_id');
            });
            Schema::table('records', function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }

        if (Schema::hasTable('collections')) {
            Schema::table('collections', function (Blueprint $table) {
                $table->text('title');
                $table->text('description');
            });
            Schema::table('collections', function (Blueprint $table) {
                $table->dropColumn('uuid');
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
        Schema::table('records', function (Blueprint $table) {
            $table->dropColumn('collection_id');
        });

        Schema::table('collections', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
        });
    }
}
