<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->index()->constrained('posts', 'id')->cascadeOnDelete();
            $table->foreignId('tag_id')->index()->constrained('tags', 'id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('tags');
    }
};
