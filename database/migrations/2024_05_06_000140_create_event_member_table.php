<?php

use App\Models\Event;
use App\Models\Member;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('event_member', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Event::class);
            $table->foreignIdFor(Member::class);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_member');
    }
};
