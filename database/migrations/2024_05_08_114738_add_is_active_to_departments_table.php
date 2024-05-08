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
        Schema::table('departments', function (Blueprint $table) {
            $table->integer('is_active')->nullable();
            $table->renameColumn('admin_id' , 'user_id' );
            $table->softDeletes();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->renameColumn('user_id' , 'admin_id' );
            $table->dropSoftDeletes();
            $table->dropColumn('deleted_by');
        });
    }
};
