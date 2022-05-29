<?php




namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Supervisor;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Reader\Exception;

use PhpOffice\PhpSpreadsheet\Writer\Xls;

use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelController extends Controller

{

    /**

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     */


    /**

     * @param Request $request

     * @return \Illuminate\Http\RedirectResponse

     * @throws \Illuminate\Validation\ValidationException

     * @throws \PhpOffice\PhpSpreadsheet\Exception

     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'role:admin']);
    }

    function importData(Request $request)
    {

        $this->validate($request, [

            'uploaded_file' => 'required|file|mimes:xls,xlsx,csv'

        ]);




        $the_file = $request->file('uploaded_file');

        try {

            $spreadsheet = IOFactory::load($the_file->getRealPath());

            $sheet        = $spreadsheet->getActiveSheet();

            $row_limit    = $sheet->getHighestDataRow();

            $column_limit = $sheet->getHighestDataColumn();

            $row_range    = range(2, $row_limit);

            $column_range = range('G', $column_limit);

            $startcount = 2;




            $data = array();




            foreach ($row_range as $row) {

                $data[] = [

                    'id' => $sheet->getCell('A' . $row)->getValue(),
                    'No_Matrik' => $sheet->getCell('B' . $row)->getValue(),
                    'No_KP' => $sheet->getCell('C' . $row)->getValue(),
                    'Nama' => $sheet->getCell('D' . $row)->getValue(),
                    'kod_Prog' => $sheet->getCell('E' . $row)->getValue(),
                    'Tahun_Pengajian' => $sheet->getCell('F' . $row)->getValue(),
                    'No_Tel_Pelajar' => $sheet->getCell('G' . $row)->getValue(),
                    'Nama_Syarikat_LI' => $sheet->getCell('H' . $row)->getValue(),
                    'Sektor' => $sheet->getCell('I' . $row)->getValue(),
                    'Sektor_Ekonomi' => $sheet->getCell('J' . $row)->getValue(),
                    'Alamat_Syarikat' => $sheet->getCell('K' . $row)->getValue(),
                    'Poskod' => $sheet->getCell('L' . $row)->getValue(),
                    'Bandar' => $sheet->getCell('M' . $row)->getValue(),
                    'Negeri' => $sheet->getCell('N' . $row)->getValue(),
                    'Pegawai' => $sheet->getCell('O' . $row)->getValue(),
                    'No_Tel_Syarikat' => $sheet->getCell('P' . $row)->getValue(),
                    'No_Faks_Syarikat' => $sheet->getCell('Q' . $row)->getValue(),
                    'Tarikh_Mula_LI' => $sheet->getCell('R' . $row)->getValue(),
                    'Tarikh_Tamat_LI' => $sheet->getCell('S' . $row)->getValue(),
                    'Tarikh_Lapor_Diri' => $sheet->getCell('T' . $row)->getValue(),
                    'Supervisor_id' => $sheet->getCell('U' . $row)->getValue(),
                    'Program' => $sheet->getCell('V' . $row)->getValue(),
                    'Status' => $sheet->getCell('W' . $row)->getValue(),


                ];

                $startcount++;
            }




            DB::table('students')->insert($data);
        } catch (Exception $e) {

            $error_code = $e->errorInfo[1];




            return back()->withErrors('There was a problem uploading the data!');
        }

        return back()->withSuccess('Great! Students Data has been successfully uploaded.');
    }




    /**

     * @param $student_data

     */

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
            ->orderBy('Nama', 'ASC')->get();

        $data_array[] = array("id", "No_Matrik", "No_KP", "Nama", "Poskod", "Bandar", "Negeri", "Kod_Prog", "Tahun_Pengajian", "No_Tel_Pelajar", "Nama_Syarikat_LI", "Sektor", "Sektor_Ekonomi", "Alamat_Syarikat", "Pegawai", "No_Tel_Syarikat", "No_Faks_Syarikat", "Tarikh_Mula_LI", "Tarikh_Tamat_LI", "Tarikh_Lapor_Diri", "Penyelia_Fakulti_id", "Program", "Status");

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

                'Penyelia_Fakulti' => $data_item->supervisor->name ?? 'Not Assigned',

                'Program' => $data_item->Program,

                'Status' => $data_item->Status,


            );
        }

        $this->ExportExcel($data_array);
    }

    public function deleteRecord(Request $request)
    {
        $delete = DB::table('students')->delete();

        if ($delete = true) {
            return Redirect()->back()->with('success', 'Record deleted Successfully');
        } else {
            return Redirect()->back()->with('fail', 'Record was not deleted Successfully');
        }
    }

    public function viewAllocation(Request $request)
    {
        $supvervisorsList = User::where('role_id', '=', 3)->get();
        $Negeri = $request->Negeri;
        $state = Students::where('Negeri', '=', $Negeri)
            ->whereNull('Supervisor_id')
            ->orderBy('Poskod', 'desc')
            ->get();

        $allocatedStudents = Students::where('Negeri', '=', $Negeri)
            ->with('Supervisor')
            ->whereNotNull('Supervisor_id')
            ->orderBy('Poskod', 'desc')
            ->get();

        return view('admin.allocation', compact('state', 'Negeri', 'allocatedStudents', 'supvervisorsList'));
    }
}
