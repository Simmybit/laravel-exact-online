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
        Schema::create('exact_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tld');
            $table->string('client_id');
            $table->string('client_secret');
            $table->string('webhook_secret');
            $table->string('division');
            $table->string('access_token')->nullable();
            $table->string('refresh_token')->nullable();
            $table->string('token_expires')->nullable();
            $table->string('authorisation_code')->nullable();
            $table->date('enabled_at')->nullable();
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
        Schema::dropIfExists('exact_applications');
    }
};
