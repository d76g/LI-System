<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('time');
            $table->string('type');
            $table->string('link')->nullable();
            $table->foreignId('CompanySupervisor_id')->constrained('company_supervisors')->cascadeOnDelete();
            $table->foreignId('Supervisor_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('Student_id')->constrained('users')->cascadeOnDelete();
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
        Schema::dropIfExists('meetings');
    }
}
