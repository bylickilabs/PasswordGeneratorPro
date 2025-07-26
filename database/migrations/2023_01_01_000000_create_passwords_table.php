<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('passwords', function (Blueprint $table) {
            $table->id();
            $table->string('password');
            $table->string('strength')->nullable();
            $table->boolean('favorite')->default(false);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('passwords');
    }
};
