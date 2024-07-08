<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function EmployeeDashboard (){
        return view('employees.employee_dashboard');
    }
    
    public function index(){
        $employees = Employee::all();   /**get all employees from db -> before view */
        return view('employees.index', ['employees' => $employees]); /**then pass employee to view */
    }                                  /** [array -> this $employees is passed to view->'employees' from employees.index] */

    public function create(){
        return view('employees.create');
    }

    public function store(Request $request){
        $data = $request->validate([
       //     'emp_id' => 'required|string|max:5|unique:employees',
            'emp_name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|digits:10',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'joined_date' => 'required|date'
        ]);

        $newEmployee = new Employee();
      //  $newEmployee->emp_id = $data['emp_id'];
        $newEmployee->emp_name = $data['emp_name'];
        $newEmployee->birthday = $data['birthday'];
        $newEmployee->gender = $data['gender'];
        $newEmployee->phone = $data['phone'];
        $newEmployee->address = $data['address'];
        $newEmployee->email = $data['email'];
        $newEmployee->joined_date = $data['joined_date'];

        $newEmployee->save();   //storing data into db

        //when update is finished
        return redirect(route('employee.index'))->with('success','Employee details added successfully');
        //with-> "message"
        //return redirect(route('employee.index'));   //after data is stored redirect into index page
    }

            //this 'Employee' is module, '$employee' varialble employee from route
    public function edit(Employee $employee){
        return view('employees.edit', ['employee' => $employee]);
    }

            //this 'Employee' is module, '$employee' varialble employee from route {employee}
    public function update(Employee $employee, Request $request) { //we want to get info from form, so "Request $request"
            //in update, have to validate
            $data = $request->validate([    //$data is data we recieve from the form
               // 'emp_id' => 'required|string|max:5|unique:employees',
                'emp_name' => 'required|string|max:255',
                'birthday' => 'required|date',
                'gender' => 'required|in:male,female',
                'phone' => 'required|string|digits:10',
                'address' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'joined_date' => 'required|date'
            ]);
            //pass $data into Employee module from the form
        //$newEmployee->emp_id = $data['emp_id'];
        $employee->emp_name = $data['emp_name'];
        $employee->birthday = $data['birthday'];
        $employee->gender = $data['gender'];
        $employee->phone = $data['phone'];
        $employee->address = $data['address'];
        $employee->email = $data['email'];
        $employee->joined_date = $data['joined_date'];

        $employee->save();

        //when update is finished
        return redirect(route('employee.index'))->with('success','Details updated successfully');
        //with-> "message"
    } 

    public function destroy(Employee $employee){
        $employee->delete();
        return redirect(route('employee.index'))->with('success','Employee removed successfully');

    }
    //function to register employee
    public function register()
    {
        return view('auth.register');
    }
}
