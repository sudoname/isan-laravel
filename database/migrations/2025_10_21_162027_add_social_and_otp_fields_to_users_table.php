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
            // Social login fields
            $table->string('provider')->nullable()->after('password');
            $table->string('provider_id')->nullable()->after('provider');
            $table->string('provider_token')->nullable()->after('provider_id');

            // Email verification with OTP
            $table->string('otp_code')->nullable()->after('email_verified_at');
            $table->timestamp('otp_expires_at')->nullable()->after('otp_code');
            $table->boolean('is_email_verified')->default(false)->after('otp_expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'provider',
                'provider_id',
                'provider_token',
                'otp_code',
                'otp_expires_at',
                'is_email_verified'
            ]);
        });
    }
};
