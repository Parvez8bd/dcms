<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('path');
            $table->string('mime_type')->nullable();
            $table->decimal('size', 10, 2, true)->nullable()->comment('Size in kb');
            $table->string('media_type')->nullable();
            $table->timestamps();
        });

        if (Schema::hasTable('media')) {
            Schema::create('mediaables', function (Blueprint $table) {
                $table->id();
                $table->integer("media_id");
                $table->integer("mediaable_id");
                $table->string("mediaable_type");
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mediaables');
        Schema::dropIfExists('media');
    }
}
