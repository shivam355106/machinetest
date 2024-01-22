@extends('layouts.app')
<x-files :js="$js ?? []" :css="$css ?? []" />
@section('title', 'Admin | Edit Employee')
@section('content')
<div class="content-wrapper" style="min-height: 77px;">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Update Employee</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
       <div class="text-right">
			<a href="{{ route('employee.index') }}" title="blog list" class="btn btn-sm btn-primary"><i class="fa fa-list"></i> Back to list</a>
		</div>
        
    </section>

	<section class="content">
		<div class="container">
		    <div class="card">
		    	<div class="card-body">
		    		<form action="/" onsubmit="event.preventDefault();updateRequest(this,{{$employee->id}})" method="POST">
				        @csrf
				        @method('PUT')
				        <div class="row">
				            <div class="col-md-6 mb-2">
				                <div class="form-group">
				                    <strong>First Name: <span class="text-danger">*</span></strong>
				                    <input type="text" name="first_name" value="{{$employee->first_name}}" id="first_name" class="form-control" placeholder="First Name">
				                </div>
				            </div>
				            <div class="col-md-6 mb-2">
				                <div class="form-group">
				                    <strong>Last Name: <span class="text-danger">*</span></strong>
				                    <input type="text" name="last_name" value="{{$employee->last_name}}" id="last_name" class="form-control" placeholder="Last Name">
				                </div>
				            </div>
				            <div class="col-md-6 mb-2">
				                <div class="form-group">
				                    <strong>Email:</strong>
				                    <input type="email" name="email" value="{{$employee->email}}" id="email" class="form-control" placeholder="Email">
				                </div>
				            </div>
				            <div class="col-md-6 mb-2">
				                <div class="form-group">
				                    <strong>Phone:</strong>
				                    <input type="tel" name="phone" id="phone" value="{{$employee->phone}}" class="form-control" placeholder="Phone" pattern="[0-9]{10,12}">
				                </div>
				            </div>
				            <div class="col-md-6 mb-3">
				                <div class="form-group">
				                    <strong>Company: <span class="text-danger">*</span></strong>
				                    <select name="company_id" id="company_id" class="form-control">
				                    	<option value="">Select Company</option>
				                    	@foreach ($companies as $company)
				                    		<option value="{{$company->id}}" {{$employee->company_id ==$company->id?'selected':'' }}>{{$company->name}}</option>
				                    	@endforeach
				                    </select>
				                </div>
				            </div>
				            
				        </div>
				        <div class="row">
				        	<div class="col-xs-12 mb-3 text-right">
				                <button type="submit" id="storeButton" class="btn btn-primary">Submit</button>
				            </div>
				        </div>
				    </form>
		    	</div>
		    	
		    </div>
			
		</div>
	</section>
</div>
@endsection 