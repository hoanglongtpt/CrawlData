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
        Schema::create('pages_downloads', function (Blueprint $table) {
            $table->id(); // Tạo cột 'id' là primary key
            $table->string('link_login')->nullable(); // Cột 'link_login'
            $table->string('name')->nullable(); // Cột 'name'
            $table->string('image')->nullable(); // Cột 'name'
            $table->string('type')->nullable(); // Cột 'type'
            $table->integer('amount')->nullable(); // Cột 'amount'
            $table->string('user_name_login')->nullable(); // Cột 'user_name_login'
            $table->string('password_login')->nullable(); // Cột 'password_login'
            $table->timestamps(); // Tạo cột 'created_at' và 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_downloads');
    }
};
