<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('majalah', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('cover');
            $table->text('deskripsi');
            $table->string('file_pdf');
        });
    }

    public function down()
    {
        Schema::dropIfExists('majalah');
    }
};
