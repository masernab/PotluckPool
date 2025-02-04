<?php

use App\Models\Event;
use App\Models\Member;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('total_price');
            $table->timestamps();

            $table->foreignIdFor(Member::class);
            $table->foreignIdFor(Event::class);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
