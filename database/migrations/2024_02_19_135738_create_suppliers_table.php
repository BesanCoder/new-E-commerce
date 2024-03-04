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
        Schema::table('suppliers', function (Blueprint $table) {
            $table->string('contact_person')->nullable();
            $table->string('type')->nullable();
            $table->string('payment_terms')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('notes')->nullable();
            // New columns
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropColumn(['contact_person', 'type', 'payment_terms', 'status', 'notes', 'email', 'phone', 'address', 'created_at', 'updated_at']);
        });
    }
};
