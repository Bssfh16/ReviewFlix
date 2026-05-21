<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->date('birthday')->nullable();
            $table->string('country')->nullable();
            $table->text('about')->nullable();
            $table->string('pp')->nullable();
            $table->string('flavors')->nullable();
            $table->boolean('is_admin')->default(false);
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'birthday', 'country', 'about', 'pp', 'flavors', 'is_admin']);
        });
        //
    }
};
