<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->date('check_in_date')->after('booking_date');
            $table->date('check_out_date')->after('check_in_date');
            $table->decimal('amount', 10, 2)->after('phone')->nullable();
            $table->string('payment_status')->default('pending')->after('amount');
            $table->string('payment_reference')->nullable()->after('payment_status');
            $table->text('additional_info')->nullable()->after('payment_reference');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'check_in_date',
                'check_out_date',
                'amount',
                'payment_status',
                'payment_reference',
                'additional_info'
            ]);
        });
    }
};
