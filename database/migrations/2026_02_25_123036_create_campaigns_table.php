<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
//            $table->string('subject');
//            $table->foreignId('email_list_id')->constrained('mails');
//            $table->foreignId('template_id')->constrained('templates');
            $table->boolean('track_click')->default(false);
            $table->boolean('track_open')->default(false);
            $table->text('body')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
