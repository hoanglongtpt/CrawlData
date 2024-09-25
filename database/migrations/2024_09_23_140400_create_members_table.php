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
        Schema::create('members', function (Blueprint $table) {
            $table->id(); // 'id' là khóa chính kiểu bigint tự động tăng
            $table->string('name', 255)->nullable(); // Cột 'name' kiểu varchar với độ dài 255
            $table->string('user_name', 255)->nullable(); // Cột 'user_name' kiểu varchar với độ dài 255
            $table->string('password')->nullable(); // Cột 'password' kiểu varchar
            $table->string('type')->nullable(); // Cột 'type' kiểu varchar
            $table->string('status')->nullable(); // Cột 'status' kiểu varchar
            $table->integer('account_balance')->default(0)->nullable(); // Cột 'account_balance' kiểu integer, giá trị mặc định là 0
            $table->timestamps(); // Tạo cột 'created_at' và 'updated_at' kiểu timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
