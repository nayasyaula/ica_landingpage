<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->foreignId('scanned_by')->nullable()->after('checked_in_at')->constrained('admins');
            $table->timestamp('scanned_at')->nullable()->after('scanned_by');
            $table->string('scanner_name')->nullable()->after('scanned_at');
        });
    }

    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropForeign(['scanned_by']);
            $table->dropColumn(['scanned_by', 'scanned_at', 'scanner_name']);
        });
    }
};