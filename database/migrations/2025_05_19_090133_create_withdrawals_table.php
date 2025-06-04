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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id('withdrawal_id')->primary();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('user_id') // sesuai nama PK di users
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('number',255);
            $table->string('bank',255);

            $table->float('withdrawal_balance')->default(0);
            $table->dateTime('datetime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
