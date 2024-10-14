<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('history_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id')->nullable()->change(); // Thay đổi cột page_id cho phép null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id')->nullable(false)->change(); // Đặt lại cột page_id không cho phép null
        });
    }
};
