<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', static function (Blueprint $table): void {
            $table->id();
            $table->text('title');
            $table->text('tagId')->nullable();
            $table->timestamps();
        });
        Schema::create('tags', static function (Blueprint $table): void {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
