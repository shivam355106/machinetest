@extends('layouts.app')
@section('title', 'Admin | Company Details')
@section('content')
<div class="content-wrapper" style="min-height: 77px;">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Company</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
       <div class="text-right">
			<a href="{{ route('company.index') }}" title="blog list" class="btn btn-sm btn-primary"><i class="fa fa-list"></i> Back to list</a>
		</div>
        
    </section>
	<section class="content">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-3 text-center">
						@if ($company->logo)
                      		<img src="{{ asset($company->logo) }}" alt="{{ $company->name }}" class="img-circle img-fluid" width="200">
                      	@else
                      		<img src="{{ asset('assets/img/logo.png') }}" alt="{{ $company->name }}" class="img-circle img-fluid">
                      	@endif
                    </div>
                    <div class="col-7">
                      <h2 class="lead"><b>{{ $company->name }}</b></h2>
                      <p class="text-muted text-sm mb-0"><b>Email: </b> {{ $company->email }} </p>
                      <p class="text-muted text-sm"><b>Website: </b> {{ $company->website }} </p>
                    </div>
			    </div>
			</div>
		</div>
		
	</section>
</div>
@endsection 