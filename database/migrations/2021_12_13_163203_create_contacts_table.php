<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('organigation_name')->nullable();
            $table->string('owner_name');
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Others']);
            $table->date('date_of_birth')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('religion')->nullable();
            $table->string('nid')->nullable();
            $table->foreignId('country_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('contact_type');
            $table->softDeletes();
            $table->timestamps();
        });

        if (Schema::hasTable('contacts')) {
            // nominee 
            Schema::create('contact_nomimees', function (Blueprint $table) {
                $table->id();
                $table->foreignId('contact_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
                $table->unsignedBigInteger('nominee_id')->nullable();
                $table->string('relation')->nullable();
                $table->timestamps();
            });

            // contact communications
            Schema::create('contact_communications', function (Blueprint $table) {
                $table->id();
                $table->foreignId('contact_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
                $table->string('contact');
                $table->boolean('is_primary')->default(0);
                $table->string('contact_number_type');
                $table->timestamps();
            });

            // address
            Schema::create('contact_addresses', function (Blueprint $table) {
                $table->id();
                $table->foreignId('contact_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('division_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('district_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('upazila_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('union_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
                $table->text('address')->nullable();
                $table->string('contact_address_type');
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
        Schema::dropIfExists('contact_nomimees');
        Schema::dropIfExists('contact_communications');
        Schema::dropIfExists('contact_addresses');
        Schema::dropIfExists('contacts');
    }
}
