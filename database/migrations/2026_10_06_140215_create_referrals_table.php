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
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('new')->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->string('sex')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('ndis_number')->nullable();
            $table->date('ndis_plan_start')->nullable();
            $table->date('ndis_plan_end')->nullable();
            $table->string('plan_management')->nullable();
            $table->string('referrer_role')->nullable();
            $table->text('referrer_details')->nullable();
            $table->string('source')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
