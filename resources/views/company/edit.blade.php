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
              <li class="breadcrumb-item active">Edit Employee</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
       <div class="text-right">
			<a href="{{ route('company.index') }}" title="blog list" class="btn btn-sm btn-primary"><i class="fa fa-list"></i> Back to list</a>
		</div>
        
    </section>

	<section class="content">
		<div class="container">
			
		    <div class="card">
		    	<div class="card-body">
		    		<form action="/" onsubmit="event.preventDefault();updateRequest(this,{{$company->id}})" enctype="multipart/form-data">
		    			@csrf
    					@method('PUT')
				       
				        <div class="row">
				            <div class="col-md-6 mb-2">
				                <div class="form-group">
				                    <strong>Company Name: <span class="text-danger">*</span></strong>
				                    <input type="text" name="name" id="name" value="{{$company->name}}" class="form-control" placeholder="Company Name">
				                </div>
				            </div>
				            <div class="col-md-6 mb-2">
				                <div class="form-group">
				                    <strong>Email:</strong>
				                    <input type="email" name="email" value="{{$company->email}}" id="email" class="form-control" placeholder="Email">
				                </div>
				            </div>
				            <div class="col-md-6 mb-2">
				                <div class="form-group">
				                    <strong>Website: </strong>
				                    <input type="text" name="website" id="website" value="{{$company->website}}" class="form-control" placeholder="Website">
				                </div>
				            </div>
				            <div class="col-md-6 mb-3">
				                <div class="form-group">
				                    <strong>Logo: (Minimum: 100 X 100)</strong>
				                    <input type="file" class="form-control" id="logo" name="logo">
				                    @if ($company->logo)
				                    	<img src="{{asset($company->logo)}}" alt="" width="80">
				                    @endif
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