<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notepads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('business_name');
            $table->string('owner_name');
            $table->string('mobile_number')->nullable();
            $table->string('email_address')->nullable();
            $table->text('billing_address')->nullable();
            $table->string('product_pitched')->nullable();
            $table->decimal('amount_quoted', 12, 2)->nullable();
            $table->date('callback_date')->nullable();
            $table->string('closer_name')->nullable();
            $table->text('comments')->nullable();
            $table->string('directory_link')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notepads');
    }
};
