<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supervision_id')->constrained()->onDelete('cascade');
            $table->string('description');//description task
            // $table->string('is_completed')->default('1');
            $table->softDeletes();
            $table->timestamp('completed_at')->nullable();
            $table->boolean('editing')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controls');
    }
};
