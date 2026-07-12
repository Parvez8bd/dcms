<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_distributions', function (Blueprint $table) {
            $table->id();
            $table->date('distribution_date');
            $table->foreignId('contact_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->float('commission', 12, 2)->default(0);
            $table->float('paid', 12, 2)->default(0);
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
        Schema::dropIfExists('commission_distributions');
    }
}
