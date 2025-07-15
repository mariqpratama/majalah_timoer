<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('majalah', function (Blueprint $table) {
            $table->string('slug', 32)->unique()->after('file_pdf')->nullable();
        });
    }

    public function down()
    {
        Schema::table('majalah', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
