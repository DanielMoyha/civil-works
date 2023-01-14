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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');//encargado
            $table->foreignId('type_work_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->nullable()->constrained();
            $table->string('name_contractor');
            $table->string('address_contractor');
            $table->string('work_duration');
            $table->boolean('status')->default(1);//0 -> de baja, 1 -> en ejecución
            $table->date('start_date');// M-Y
            $table->date('completion_date');// M-Y
            $table->string('value_approximate_services');
            $table->string('description');
            //$table->string('company_signature');// firma, probablemente
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
        Schema::dropIfExists('works');
    }
};
