<?php

namespace App\Models;

use App\Models\Supervisor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'id',
        'No_Matrik',
        'No_KP',
        'Nama',
        'Kod_Prog',
        'Tahun_Pengajian',
        'No_Tel_Pelajar',
        'Nama_Syarikat_LI',
        'Sektor',
        'Sektor_Ekonomi',
        'Alamat_Syarikat',
        'Poskod',
        'Bandar',
        'Negeri',
        'Pegawai',
        'No_Tel_Syarikat',
        'No_Faks_Syarikat',
        'Tarikh_Mula_LI',
        'Tarikh_Tamat_LI',
        'Tarikh_Lapor_Diri',
        'Supervisor_id',
        'Program',
        'Status',
    ];

    public function Supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'Supervisor_id');
    }
}
