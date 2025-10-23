<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add role column
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['user', 'admin', 'superadmin'])->default('user')->after('email');
            $table->json('admin_permissions')->nullable()->after('role');
        });

        // Convert existing is_admin users to superadmin role
        DB::table('users')->where('is_admin', true)->update(['role' => 'superadmin']);

        // Drop the old is_admin column
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back is_admin column
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false)->after('email');
        });

        // Convert superadmin and admin roles back to is_admin
        DB::table('users')->whereIn('role', ['admin', 'superadmin'])->update(['is_admin' => true]);

        // Drop role and permissions columns
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'admin_permissions']);
        });
    }
};
