<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the company.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Company::latest();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('name', function($data) {
                         return $data->name;
                    })->editColumn('email', function($data) {
                        return $data->email??'--';
                    })->editColumn('logo', function($data) {
                        if ($data->logo) {
                           return '<img src="'.asset($data->logo).'" alt="'.$data->name.'" width="80">'; 
                        }else{
                            return '--';
                        }
                    })
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="'.route('company.show', $row->id).'" class="edit btn btn-info btn-sm">View</a>
                                <a href="'.route('company.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>
                                <form method="post" id="myform"  action="'.route('company.destroy', $row->id).'">
                                    '.csrf_field().' 
                                    '.method_field('delete').'
                                    <button type="submit"class="btn btn-sm btn-danger paid-continue-btn">
                                    Delete
                                    </button>
                                </form>';
      
                            return $btn;
                    })
                    ->rawColumns(['action','name','email','logo'])
                    ->make(true);
        }
          
        return view('company.index');
    }

    /**
     * Show the form for creating a new company.
     */
    public function create()
    {
        $js = ['assets/js/company'];
        return view('company.create',compact('js'));
    }

    /**
     * Store a newly created company in storage.
     */
    public function store(CompanyFormRequest $request)
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
            return response()->json(['success'=>'Data stored successfully.!','redirect_url'=>'company']);
        }else{

            //return response
            return response()->json(['error'=>'Something went wrong.!']);
        }
    }

    /**
     * Display the specified company.
     */
    public function show(Company $company)
    {
        return view('company.show',compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     */
    public function edit(Company $company)
    {
        $js = ['assets/js/company'];
        return view('company.edit',compact('company','js'));
    }

    /**
     * Update the specified company in storage.
     */
    public function update(CompanyFormRequest $request, Company $company)
    {
        //check validation rules
        $request->validated();

        // update data
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        //check if logo is not empty
        if($request->file('logo')) {

            //upload logo
            $file = $request->logo;
            $path = '/logo/';
            $filename   = time() . $file->getClientOriginalName();
            $file->storeAs($path,$filename);
            $filePath   = 'storage'.$path . $filename;

            //delete old image
            Storage::delete('/logo/'.basename($company->logo));

            //update company with new logo
            $company->logo = $filePath;
        }
        if ($company->save()) {

            //return response
            return response()->json(['success'=>'Data updated successfully.!','redirect_url'=>'company']);
        }else{

            //return response
            return response()->json(['error'=>'Something went wrong.!']);
        }
    }

    /**
     * Remove the specified company from storage.
     */
    public function destroy(Company $company)
    {
         
        // check company has employees
         if (count($company->employees) > 0) 
            return redirect()->route('company.index')->with('error', 'Sorry! This company has employees');
        //delete image
        Storage::delete('/logo/'.basename($company->logo));

        //delete company
        $company->delete();

         return redirect()->route('company.index')->with('success', 'Company deleted successfully');
    }
}
