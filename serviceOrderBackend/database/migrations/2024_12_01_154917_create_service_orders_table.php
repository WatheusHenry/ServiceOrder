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
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id(); 
            $table->date('open_date'); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->string('customer_name'); 
            $table->string('customer_cpf'); 
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); 
            $table->text('customer_complaint')->nullable(); 
            $table->text('technical_solution')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};
