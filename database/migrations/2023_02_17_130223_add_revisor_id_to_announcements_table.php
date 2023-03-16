<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('announcements', function (Blueprint $table) {

            $table->unsignedBigInteger('revisor_id')->nullable();
            $table->foreign('revisor_id')->references('id')->on('users')->onDelete('SET NULL');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropForeign(['revisor_id']);
            $table->dropColumn('revisor_id');
        });
    }
};
