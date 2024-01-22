@extends('layouts.app')
@section('title', 'Admin | Employee Details')
@section('content')
<div class="content-wrapper" style="min-height: 77px;">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
       <div class="text-right">
			<a href="{{ route('employee.index') }}" title="blog list" class="btn btn-sm btn-primary"><i class="fa fa-list"></i> Back to list</a>
		</div>

	<section class="content">
		<div class="card-body">
				<div class="row">
					<div class="col-3 text-center">
						
                      		<img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-circle img-fluid">
                      	
                    </div>
                    <div class="col-7">
                      <h2 class="lead"><b>{{ $employee->first_name.' '.$employee->last_name }}</b></h2>
                      <p class="text-muted text-sm mb-0"><b>Email: </b> {{ $employee->email??'--' }} </p>
                      <p class="text-muted text-sm"><b>Phone: </b> {{ $employee->phone??'--' }} </p>
                      <p class="text-muted text-sm"><b>Company: </b> {{ $employee->company->name??'--' }} </p>
                    </div>
			    </div>
			</div>
		</div>
	</section>
</div>
@endsection 