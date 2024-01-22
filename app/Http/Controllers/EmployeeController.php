<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeFormRequest;
use App\Models\Employee;
use App\Models\Company;
use DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the employee.
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = Employee::with('company');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="'.route('employee.show', $row->id).'" class="edit btn btn-info btn-sm">View</a>
                                <a href="'.route('employee.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>
                                <form method="post" id="myform"  action="'.route('employee.destroy', $row->id).'">
                                    '.csrf_field().' 
                                    '.method_field('delete').'
                                    <button type="submit"class="btn btn-sm btn-danger paid-continue-btn">
                                    Delete
                                    </button>
                                </form>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('employee.index');
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        $js = ['assets/js/employee'];
        $companies = Company::get();
        return view('employee.create',compact('js','companies'));
    }

    /**
     * Store a newly created employee in storage.
     */
    public function store(EmployeeFormRequest $request)
    {
        //check validation rules
        $request->validated();

        // find company details
        $company = Company::find($request->company_id);
        // stored data
        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $company->employees()->save($employee);

        // check data stored in database
        if ($employee->id) {

            //return response
            return response()->json(['success'=>'Data stored successfully.!','redirect_url'=>'employee']);
        }else{

            //return response
            return response()->json(['error'=>'Something went wrong.!']);
        }
    }

    /**
     * Display the specified employee.
     */
    public function show(Employee $employee)
    {
        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified employee.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::get();
        $js = ['assets/js/employee'];
        return view('employee.edit',compact('employee','companies','js'));
    }

    /**
     * Update the specified employee in storage.
     */
    public function update(EmployeeFormRequest $request, Employee $employee)
    {
        //check validation rules
        $request->validated();

        // find company details
        $company = Company::find($request->company_id);
        // update data
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        // check data update or not
        if ($company->employees()->save($employee)) {
            //return response
            return response()->json(['success'=>'Data updated successfully.!','redirect_url'=>'employee']);
        }else{

            //return response
            return response()->json(['error'=>'Something went wrong.!']);
        }
    }

    /**
     * Remove the specified employee from storage.
     */
    public function destroy(Employee $employee)
    {
        //delete company
        $employee->delete();

         return redirect()->route('employee.index')->with('success', 'Employee deleted successfully');
    }
}
