<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {

        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('image_logo')->nullable();
            $table->string('image_cover')->nullable();
            $table->enum('status', [1,0])->default(1);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
