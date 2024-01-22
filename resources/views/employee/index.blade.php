@extends('layouts.app')
@section('title', 'Admin | Employee List')
@section('content')
<div class="content-wrapper" style="min-height: 77px;">
	<div class="content-header">

	      <div class="container-fluid">

	        <div class="row mb-2">

	          <div class="col-sm-6">

	            <h1 class="m-0">Add / View Employee</h1>

	          </div><!-- /.col -->

	          <div class="col-sm-6">

	            <ol class="breadcrumb float-sm-right">

	              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>

	              <li class="breadcrumb-item active">Employee</li>

	            </ol>

	          </div><!-- /.col -->

	        </div><!-- /.row -->
			        <div class="text-right">
					<a href="{{ route('employee.create') }}" title="add blog" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
				</div>
	      </div><!-- /.container-fluid -->

	    </div>



	<section class="content">
		@if ($message = Session::get('success'))
				<div class="alert alert-success my-2">
				  <p>{{ $message }}</p>
				</div>
				@endif
				
		<table class="table table-bordered data-table" id="dataTable">
	        <thead>
	            <tr>
	                <th>No</th>
	                <th>First Name</th>
	                <th>Last Name</th>
	                <th>Email</th>
	                <th>Company</th>
	                <th width="100px">Action</th>
	            </tr>
	        </thead>
	        <tbody>
	        </tbody>
	    </table>
	</section>
</div>
@endsection 
@section('script')
<script type="text/javascript">
  $(function () {
      
    var table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('employee.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'company.name', name: 'company.name', orderable: false, searchable: true },
            {data: 'action', name: 'action'},
        ]
    });
      
  });
</script>
@endsection