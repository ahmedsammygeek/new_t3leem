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
            $table->integer('added_by');
            $table->tinyInteger('is_blocked');
            $table->boolean('super_admin')->default(false)->comment('is this user super admin or not');
            $table->string('mobile');
            $table->string('notes')->nullable();
            $table->text('image')->nullable();
            $table->string('email')->change()->nullable();
            $table->tinyInteger('type')->comment('user type 1 is admin , 2 is teacher 3 is assistant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('added_by');
            $table->dropColumn('is_blocked');
            $table->dropColumn('mobile');
            $table->dropColumn('notes');
            $table->dropColumn('image');
            $table->dropColumn('type');
            $table->dropColumn('super_admin');
        });
    }
};
