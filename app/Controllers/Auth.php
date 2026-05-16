<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use App\Models\EmployeeModel;

class Auth extends Controller
{
    public function index()
    {
       return view('employees/login'); 
    }
    public function login()
    {

        helper(['form']);
            $email = $this->request->getPost('emailid');
            $password = md5($this->request->getPost('password'));
            // print($password);
            // die();

            $db = Database::connect();

            $user = $db->table('employees')
                       ->where('email', $email)
                       ->get()
                       ->getRow();
                       // print_r($user);
                       // die();

            if($user)
            {

                if($password==$user->password)
                {
                    //print_r($user);
                    //die();

                    session()->set([
                        'user_id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role'     =>$user->role,
                        'logged_in' => true
                    ]);

                    $emailid = session()->get('email');
                    $user_id = session()->get('user_id');
                    $role = session()->get('role');

                    $empdata = [
                        'email' => $emailid,
                        'user_id'  => $user_id,
                        'role'     =>$role
                    ];

                    if($role=="0")    //if role=0,admin and 1=employee
                    {
                        $model = new EmployeeModel();
                        $data['employee_all'] = $model->where('role !=', 0)->findAll();
                        $data['employee_count'] = count($data['employee_all']); 

                        $data['employee']=$model->where('role !=', 0)->orderBy('id', 'DESC') // Sort by newest first (replace 'id' with your primary key column)
                        ->limit(3)              // Re>wherstrict the results to exactly 3 rows
                        ->findAll();
                        $twoDaysAgo = date('Y-m-d H:i:s', strtotime('-2 days'));
                        $data['new_employees'] = $model->where('role !=', 0)->where('created_at >=', $twoDaysAgo)
                        ->orderBy('created_at', 'DESC') ->findAll();
                        $data['new_count'] = count($data['new_employees']);

                        $data['departments'] = $model->distinct()->select('department')->where('role !=', 0)->where('department !=', '') // Excludes empty strings if any
                        ->findAll();
                        $data['departments_count']=count($data['departments']);

                        $model = new EmployeeModel();
                        $data['employee_all'] = $model->where('role !=', 0)->findAll();
                        $data['employee_count'] = count($data['employee_all']); 

                        $data['employee']=$model->where('role !=', 0)->orderBy('id', 'DESC') // Sort by newest first (replace 'id' with your primary key column)
                        ->limit(3)-> findAll();             // Restrict the results to exactly 3 rows
                        $twoDaysAgo = date('Y-m-d H:i:s', strtotime('-2 days'));
                        $data['new_employees'] = $model->where('role !=', 0)->where('created_at >=', $twoDaysAgo)->orderBy('created_at', 'DESC')->findAll();
                        $data['new_count'] = count($data['new_employees']);

                        $data['departments'] = $model->distinct()->select('department')->where('role !=', 0)->where('department !=', '') // Excludes empty strings if any
                        ->findAll();
                        $data['departments_count']=count($data['departments']);
                        $result = $model->select('SUM(salary) as total_salary')
                        ->where('role !=', 0) ->first();

                        $data['totalSalary'] = $result['total_salary'];


                        return view('employees/dashboard',$data);
                    }
                    else
                    {
                        return;
                    }
                }
                else
                {
                   return redirect()->back()
                                    ->with('error', 'Invalid Login'); 
                }
            }

            else
            {

            return redirect()->back()
                             ->with('error', 'Invalid Login');
            }
        

        // return view('employees/login');
    }


    public function dashboard()
    {
        $model = new EmployeeModel();
        $data['employee_all'] = $model->where('role !=', 0)->findAll();
        $data['employee_count'] = count($data['employee_all']); 
        $data['employee']=$model->where('role !=', 0)->orderBy('id', 'DESC') // Sort by newest first (replace 'id' with your primary key column)
        ->limit(3) 
        ->findAll();             // Restrict the results to exactly 3 rows
         $twoDaysAgo = date('Y-m-d H:i:s', strtotime('-2 days'));
        $data['new_employees'] = $model->where('role !=', 0)->where('created_at >=', $twoDaysAgo)
        ->orderBy('created_at', 'DESC') ->findAll();
         $data['new_count'] = count($data['new_employees']);

        $data['departments'] = $model->distinct()->select('department')
                                ->where('role !=', 0)
                                ->where('department !=', '') // Excludes empty strings if any
                                ->findAll();
        $data['departments_count']=count($data['departments']);

        $result = $model->select('SUM(salary) as total_salary')
                        ->where('role !=', 0)
                        ->first();

        $data['totalSalary'] = $result['total_salary'];

        return view('employees/dashboard',$data);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }


    //
}