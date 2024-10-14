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
            $table->string('order_code')->nullable(); // Thêm cột order_code
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('history_transactions', function (Blueprint $table) {
            $table->dropColumn('order_code'); // Xóa cột order_code nếu cần
        });
    }
};
