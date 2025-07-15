<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('majalah_visits', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable();
            $table->string('user')->nullable();
            $table->unsignedBigInteger('id_majalah');
            $table->timestamp('visited_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('majalah_visits');
    }
};
