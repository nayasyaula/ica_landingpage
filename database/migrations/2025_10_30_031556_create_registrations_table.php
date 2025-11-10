<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('position');
            $table->string('qr_code')->unique();
            $table->string('barcode_number')->unique()->nullable(); // ✅ TAMBAH INI
            $table->string('ticket_type')->default('regular'); // ✅ TAMBAH INI
            $table->boolean('is_checked_in')->default(false);
            $table->timestamp('checked_in_at')->nullable();
            $table->string('checked_in_by')->nullable();
            $table->string('checkin_method')->nullable(); // ✅ TAMBAH INI (qr_scanner, manual, bulk)
            $table->timestamps();

            $table->index('qr_code');
            $table->index('barcode_number'); // ✅ TAMBAH INI
            $table->index('is_checked_in');
            $table->index('checkin_method'); // ✅ TAMBAH INI
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};