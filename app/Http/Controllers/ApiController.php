<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EmployeeApiRequest;
use App\Http\Requests\CompanyApiRequest;
use App\Models\Employee;
use App\Models\Company;

class ApiController extends Controller
{
    public function addcompany(CompanyApiRequest $request)
    {
        //check validation rules
        $request->validated();

        // stored data
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        //check if logo is not empty
        if($request->file('logo')) {

            //upload image
            $file = $request->logo;
            $path = '/logo/';
            $filename   = time() . $file->getClientOriginalName();
            $file->storeAs($path,$filename);
            $filePath   = 'storage'.$path . $filename;
            $company->logo = $filePath;
        }
        $company->save();
        // check data stored in database
        if ($company->id) {

            //return response
            $response = [
                'success'=>'Data stored successfully.!',
                'company'=>$company
            ];
            return response($response, 200);
        }else{

            //return response
            return response()->json(['error'=>'Something went wrong.!']);
        }
    }

    // add employee 
    public function addemployee(EmployeeApiRequest $request)
    {
        //check validation rules
        $request->validated();

        // find company details
        $company = Company::find($request->company_id);
        // store data
        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        // check data added or not
        if ($company->employees()->save($employee)) {
            
            //return response
            $response = [
                'success'=>'Data stored successfully.!',
                'employee'=>$employee
            ];
            return response($response, 200);
        }else{

            //return response
            return response()->json(['error'=>'Something went wrong.!']);
        }
    }

    // get company detail by details
    public function company_detail($id)
    {
        $company = Company::find($id);
        if (!$company){
            $response = ["error" => "Company not found"];
                 return response($response, 422);
        } 
        $response = [
            'company'=>$company
        ];
        return response($response, 200);
        
    }

    // get all employee depends on company id
    public function employee_list($company_id)
    {
        $company = Company::find($company_id);
        
        if (!$company){
            $response = ["error" => "Company not found"];
                 return response($response, 422);
        } 
        $employees = $company->employees;
        $response = [
            'employees'=>$employees
        ];
        return response($response, 200);
        
    }


}
