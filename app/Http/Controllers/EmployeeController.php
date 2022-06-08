<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Excel;
use App\Imports\EmployeeImport;
use App\Exports\EmployeeExport;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function importForm()
    {
        return view('import-form');
    }
    public function import(Request $request)
    {
        Excel::import(new EmployeeImport,$request->file);
        return 'Record are imported successfully!';
    }
    public function addEmployee()
    {
        $employees = [
            ['name'=> 'yamen', 'email'=> 'yamen@gmail.com', 'phone'=>'12346789', 'salary'=> '20000','department'=> 'programming'],
        ];
        Employee::insert($employees);
        return "add is done";
    }
    public function exportIntoExcel()
    {
        return Excel::download(new EmployeeExport,'employeelist.xlsx');
    }
    public function exportIntoCSV()
    {
        return Excel::download(new EmployeeExport,'employeelist.csv');
    }
}
