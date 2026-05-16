<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Dompdf\Dompdf;

class Employee extends BaseController
{
    // public function __construct()
    // {
    //     if(!session()->get('logged_in'))
    //     {
    //         header('Location: /login');
    //         exit;
    //     }
    // }
    public function index()
    {
        $model = new EmployeeModel();

        $data['employees'] = $model->findAll();

        return view('employees/view', $data);
    }

    public function create()
    {
        return view('employees/create');
    }

    public function store()
    {
        $model = new EmployeeModel();

        $model->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'department' => $this->request->getPost('department'),
            'salary' => $this->request->getPost('salary'),
            'role'  =>'1',
        ]);

        return redirect()->back()
                         ->with('success', 'Added Successfully');
    }

    public function edit($id)
    {
        $model = new EmployeeModel();

        $data['employee'] = $model->find($id);

        return view('employees/edit', $data);
    }

    public function update($id)
    {
        $model = new EmployeeModel();

        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'department' => $this->request->getPost('department'),
            'salary' => $this->request->getPost('salary'),
        ]);

        return redirect()->back()
                         ->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        $model = new EmployeeModel();

        $model->delete($id);

        return redirect()->to(base_url('dashboard'))->with('success',"Employee Deleted Successfully");
    }

    public function excel()
    {
        $model = new EmployeeModel();

        $employees = $model->where('role !=', 0)->findAll();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Phone');
        $sheet->setCellValue('E1', 'Department');
        $sheet->setCellValue('F1', 'Salary');

        $row = 2;

        foreach($employees as $employee)
        {
            $sheet->setCellValue('A'.$row, $employee['id']);
            $sheet->setCellValue('B'.$row, $employee['name']);
            $sheet->setCellValue('C'.$row, $employee['email']);
            $sheet->setCellValue('D'.$row, $employee['phone']);
            $sheet->setCellValue('E'.$row, $employee['department']);
            $sheet->setCellValue('F'.$row, $employee['salary']);

            $row++;
        }

        $filename = 'employees.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="'.$filename.'"');

        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output');

        exit;
    }

    public function pdf()
    {
        $model = new EmployeeModel();

        $data['employees'] = $model->where('role !=', 0)->findAll();

        $html = view('employees/pdf', $data);

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream('employees.pdf');
    }


    public function view()
    {
        $model = new EmployeeModel();
        $data['employees'] = $model->where('role !=', 0)->findAll();
        return view('employees/view', $data);


    }

}