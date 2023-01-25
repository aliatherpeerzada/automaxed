<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->string('license_customer_name');
            $table->string('license_customer_email');
            $table->string('license_key');
            $table->integer('license_allowed_activities');
            $table->string('license_expiry_date');
            $table->boolean('license_status');
            $table->text('license_note')->nullable();
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
        Schema::dropIfExists('licenses');
    }
};
