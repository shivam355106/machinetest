<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
            $table->string('logo')->nullable()->change();
            $table->string('website')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('email')->nullable(false)->change();
            $table->string('logo')->nullable(false)->change();
            $table->string('website')->nullable(false)->change();
        });
    }
};
