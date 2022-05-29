<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('No_Matrik');
            $table->string('No_KP');
            $table->string('Nama');
            $table->string('Kod_Prog');
            $table->integer('Tahun_Pengajian');
            $table->string('No_Tel_Pelajar')->nullable();
            $table->text('Nama_Syarikat_LI');
            $table->string('Sektor');
            $table->string('Sektor_Ekonomi')->nullable();;
            $table->string('Alamat_Syarikat');
            $table->integer('Poskod');
            $table->string('Bandar')->nullable();
            $table->string('Negeri');
            $table->string('Pegawai');
            $table->string('No_Tel_Syarikat')->nullable();
            $table->string('No_Faks_Syarikat')->nullable();
            $table->string('Tarikh_Mula_LI')->nullable();
            $table->string('Tarikh_Tamat_LI')->nullable();
            $table->string('Tarikh_Lapor_Diri')->nullable();
            $table->foreignId('Supervisor_id')->nullable()->constrained('Users')->cascadeOnDelete();
            $table->string('Program');
            $table->text('Status')->nullable();
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
        Schema::dropIfExists('students');
    }
}
