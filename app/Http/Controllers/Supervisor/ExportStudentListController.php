<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Writer\Xls;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

class ExportStudentListController extends Controller
{
    public function ExportExcel($student_data)
    {

        ini_set('max_execution_time', 0);

        ini_set('memory_limit', '4000M');




        try {

            $spreadSheet = new Spreadsheet();

            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);

            $spreadSheet->getActiveSheet()->fromArray($student_data);




            $Excel_writer = new Xls($spreadSheet);

            header('Content-Type: application/vnd.ms-excel');

            header('Content-Disposition: attachment;filename="Student_DataList.xls"');

            header('Cache-Control: max-age=0');

            ob_end_clean();

            $Excel_writer->save('php://output');

            exit();
        } catch (Exception $e) {

            return;
        }
    }




    /**

     *This function loads the student data from the database then converts it

     * into an Array that will be exported to Excel

     */

    function exportData()
    {

        $data = Students::with('supervisor')
            ->where('supervisor_id', '=', Auth::user()->id)
            ->orderBy('Nama', 'ASC')->get();

        $data_array[] = array(
            "id", "No_Matrik", "No_KP", "Nama", "Poskod", "Bandar", "Negeri",
            "Kod_Prog", "Tahun_Pengajian", "No_Tel_Pelajar", "Nama_Syarikat_LI", "Sektor",
            "Sektor_Ekonomi", "Alamat_Syarikat", "Pegawai", "No_Tel_Syarikat", "No_Faks_Syarikat",
            "Tarikh_Mula_LI", "Tarikh_Tamat_LI", "Tarikh_Lapor_Diri", "Program", "Status"
        );

        foreach ($data as $data_item) {

            $data_array[] = array(

                'id' => $data_item->id,

                'No_Matrik' => $data_item->No_Matrik,

                'No_KP' => $data_item->No_KP,

                'Nama' => $data_item->Nama,

                'Kod_Prog' => $data_item->Kod_Prog,

                'Tahun_Pengajian' => $data_item->Tahun_Pengajian,

                'No_Tel_Pelajar' => $data_item->No_Tel_Pelajar,

                'Nama_Syarikat_LI' => $data_item->Nama_Syarikat_LI,

                'Sektor' => $data_item->Sektor,

                'Sektor_Ekonomi' => $data_item->Sektor_Ekonomi,

                'Alamat_Syarikat' => $data_item->Alamat_Syarikat,

                'Poskod' => $data_item->Poskod,

                'Bandar' => $data_item->Bandar,

                'Negeri' => $data_item->Negeri,

                'Pegawai' => $data_item->Pegawai,

                'No_Tel_Syarikat' => $data_item->No_Tel_Syarikat,

                'No_Faks_Syarikat' => $data_item->No_Faks_Syarikat,

                'Tarikh_Mula_LI' => $data_item->Tarikh_Mula_LI,

                'Tarikh_Tamat_LI' => $data_item->Tarikh_Tamat_LI,

                'Tarikh_Lapor_Diri' => $data_item->Tarikh_Lapor_Diri,

                'Program' => $data_item->Program,

                'Status' => $data_item->Status,


            );
        }

        $this->ExportExcel($data_array);
    }
}
