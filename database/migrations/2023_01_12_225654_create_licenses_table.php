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
            $table->boolean('license_status');
            $table->string('license_product_name');
            $table->string('license_expiry_date');
            $table->integer('license_used_activations')->default(0);

            $table->integer('license_allowed_activations');
            $table->string('license_key');
            $table->string('license_customer_name');
            $table->string('license_customer_email')->nullable();
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
