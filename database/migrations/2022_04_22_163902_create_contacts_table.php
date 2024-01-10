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
        Schema::create('Contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('FirstName',40);
            $table->string('MiddleName',40)->nullable();
            $table->string('LastName',40)->nullable();
            $table->string('logo')->nullable();
            $table->string('PhoneNumbers')->nullable();
            $table->string('tags')->nullable();
            $table->string('company')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->longText('Comment')->nullable();
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
        Schema::dropIfExists('contacts');
    }
};
