<?php




namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    function index()

    {

        $data = DB::table('students')->orderBy('Nama', 'ASC')->paginate(5);

        return view('dashboard', compact('data'));
    }




    /**

     * @param Request $request

     * @return \Illuminate\Http\RedirectResponse

     * @throws \Illuminate\Validation\ValidationException

     * @throws \PhpOffice\PhpSpreadsheet\Exception

     */

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

            $column_range = range('D', $column_limit);

            $startcount = 2;




            $data = array();




            foreach ($row_range as $row) {

                $data[] = [

                    'Bil' => $sheet->getCell('A' . $row)->getValue(),

                    'No_Matrik' => $sheet->getCell('B' . $row)->getValue(),

                    'No_KP' => $sheet->getCell('C' . $row)->getValue(),

                    'Nama' => $sheet->getCell('D' . $row)->getValue(),


                ];

                $startcount++;
            }




            DB::table('students')->insert($data);
        } catch (Exception $e) {

            $error_code = $e->errorInfo[1];




            return back()->withErrors('There was a problem uploading the data!');
        }

        return back()->withSuccess('Great! Data has been successfully uploaded.');
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

        $data = DB::table('students')->orderBy('Nama', 'ASC')->get();




        $data_array[] = array("Bil", "No_Matrik", "No_KP", "Nama");

        foreach ($data as $data_item) {

            $data_array[] = array(

                'Bil' => $data_item->Bil,

                'No_Matrik' => $data_item->No_Matrik,

                'No_KP' => $data_item->No_KP,

                'Nama' => $data_item->Nama,


            );
        }

        $this->ExportExcel($data_array);
    }

    public function destroy($users = null)
    {
        # code...
    }
}
