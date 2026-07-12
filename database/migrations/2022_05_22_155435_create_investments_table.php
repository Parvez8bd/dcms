<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('project_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('contact_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignId('nominee_id')->constrained('contacts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('investment_date');
            // $table->timestamp('expiry_date');
            // $table->unsignedBigInteger('duration')->default(0)->comment('months');
            $table->float('amount', 12, 2)->default(0);
            // $table->float('interest', 10, 2)->default(0)->comment('percentage');
            // $table->string('investment_policy')->nullable();
            // $table->unsignedBigInteger('withdraw_policy')->default(0)->comment('months');
            $table->text('note')->nullable();
            // $table->boolean('is_active')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('investments');
    }
}
