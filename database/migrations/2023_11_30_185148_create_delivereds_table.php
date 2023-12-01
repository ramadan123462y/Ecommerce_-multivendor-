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
        Schema::create('delivereds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderadmin_id')->references('id')->on('order_admins')->cascadeOnDelete();
            $table->double('x')->nullable();
            $table->double('y')->nullable();
            $table->enum('status', ['in_progress', 'delivered', 'pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivereds');
    }
};
