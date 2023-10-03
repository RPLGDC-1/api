<?php

use App\Models\PaymentLog;
use App\Models\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('payment_logs', function (Blueprint $table) {
            PaymentLog::query()->delete();
            $table->dropForeign(['transaction_id']);
            $table->dropColumn('transaction_id');
            $table->string('external_id')->after('body');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_logs', function (Blueprint $table) {
            //
        });
    }
};
